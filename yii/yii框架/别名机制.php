<?php
/*别名和导入：
允许通过别名引用或导入外部的完全限定名称
 所有支持命名空间的PHP版本支持三种别名或导入方式：为类名称使用别名、为接口使用别名或为命名空间名称使用别名。
 PHP 5.6开始允许导入函数或常量或者为它们设置别名。
 在PHP中，别名是通过操作符 use 来实现的. 	 
 
 
因为开发需要，有时候我们需要将一些路径或URL保存起来，避免直接写到代码中，于是我们定义了一个类似于常量的变量，在全局均可以使用，这个变量就叫做别名，当然你也可以在配置文件中进行设置。
在yii中我们可以人为指定别名并使用它们，并且，yii还有默认预定义的别名12个

预定义的别名：

    @yii 表示Yii框架所在的目录，也是 yii\BaseYii 类文件所在的位置(vendor/yiisoft/yii2/BaseYii.php)
    @app 表示正在运行的应用的根目录(非网站根目录)
    @vendor 表示Composer第三方库所在目录，你通过composer下载的库，包含yiisoft核心库都在这里。
    @bower 表示Bower第三方库所在目录，一般在vendor/bower里（该库主要存放一些例如jquery的库文件）
    @npm 表示npm第三方库所在目录，一般是 @vendor/npm
    @runtime 表示正在运行的应用的运行时用于存放运行时文件的目录，比如缓存、日志等等。
    @webroot 表示正在运行的应用的入口文件 index.php 所在的目录，一般是 @app/web.记住，这是物理路径。
    @web URL别名，表示当前应用的根URL，主要用于前端；（末尾没有斜杠/）

下面4个你会将在yii高级版中看到，基础版请飞过。

    @common 表示通用文件夹；
    @frontend 表示前台应用所在的文件夹；
    @backend 表示后台应用所在的文件夹；
    @console 表示命令行应用所在的文件夹；

关于这12个别名，北哥提醒的是@web，这是所有预定于别名中唯一一个URL类型的（其他均为服务器物理路径），记住@web代表应用的URL，且后面没有/斜杠。


为何全局都可以用？
是的，如果想全局使用，那就要在入口或yii这个应用建立之时就开始定义它们，只有这才可以

首先我们访问了入口文件，入口文件做了两件事情：
    加载配置文件
    将配置文件传递给Application，生成一个yii application
当程序执行了(new yii\web\Application($config))->run();

我们解释就是$config传递给了Application类，并且生成一个对象，这个新建过程由Application的构造函数完成。

而你也发现了Application本身没有构造函数，那么它将使用父类 \yii\base\Application 的构造函数。

public function __construct($config = [])
{
    Yii::$app = $this;
    static::setInstance($this);

    $this->state = self::STATE_BEGIN;

    $this->preInit($config);

    $this->registerErrorHandler($config);

    Component::__construct($config);
}

preInit 关键就在于preInit这个函数，它完成了类似于@vendor、@runtime等预定义别名的定义工作，比如@vendor

public function setVendorPath($path)
{
    $this->_vendorPath = Yii::getAlias($path);
    Yii::setAlias('@vendor', $this->_vendorPath);
    Yii::setAlias('@bower', $this->_vendorPath . DIRECTORY_SEPARATOR . 'bower');
    Yii::setAlias('@npm', $this->_vendorPath . DIRECTORY_SEPARATOR . 'npm');
}

因为这些操作都是在入口文件实例化Application类的时候建立，因此之后的所有操作都可以直接使用预定义别名。

到此刻，我们明白了为何可以全局使用了吧。

非也，你会发现@web和@webroot并没有一个函数去预定义它们！没错，因为 \yii\base\Application 是yii抽象出来的基本Application类，实际运行中会有例如 yii\web\Application 或 yii\console\Controller 进行集成然后实例化为各种场景下的application。

说道这里你不难理解为何没有@web和@webroot的预定义了吧，\yii\base\Application 仅仅负责yii程序最基本的预定义别名的定义，而@web和@webroot属于web的东东，应该有其子类yii\web\Application，那么我们开始寻找它。

眼神1.5的你一定在 yii\web\Application 中发现了下面的代码

protected function bootstrap()
{
    $request = $this->getRequest();
    Yii::setAlias('@webroot', dirname($request->getScriptFile()));
    Yii::setAlias('@web', $request->getBaseUrl());

    parent::bootstrap();
}

是滴，我们的确找到了答案，现在所有的预定于别名都找到了出处，至于当我们建立Application对象的时候是如何调用bootstrap函数的，阿北这里不进行说明，请你按类的继承关系进行分析，就知道咋回事了。

一不小心又写了这么长，“寻找它们”就到这里，下一篇将为你讲解 getAlias 和 setAlias 来个别名核心函数。






