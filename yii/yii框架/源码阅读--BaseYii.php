<?php
//BaseYii.php

namespace yii;

use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\base\UnknownClassException;
use yii\log\Logger;
use yii\di\Container;

//第1行定义命名空间为yii；

//第3到7行使用了命名空间；

/**
 * Gets the application start timestamp.
 */
defined('YII_BEGIN_TIME') or define('YII_BEGIN_TIME', microtime(true));
/**
 * This constant defines the framework installation directory.
 */
defined('YII2_PATH') or define('YII2_PATH', __DIR__);
/**
 * This constant defines whether the application should be in debug mode or not. Defaults to false.
 */
defined('YII_DEBUG') or define('YII_DEBUG', false);
/**
 * This constant defines in which environment the application is running. Defaults to 'prod', meaning production environment.
 * You may define this constant in the bootstrap script. The value could be 'prod' (production), 'dev' (development), 'test', 'staging', etc.
 */
defined('YII_ENV') or define('YII_ENV', 'prod');
/**
 * Whether the the application is running in production environment
 */
defined('YII_ENV_PROD') or define('YII_ENV_PROD', YII_ENV === 'prod');
/**
 * Whether the the application is running in development environment
 */
defined('YII_ENV_DEV') or define('YII_ENV_DEV', YII_ENV === 'dev');
/**
 * Whether the the application is running in testing environment
 */
defined('YII_ENV_TEST') or define('YII_ENV_TEST', YII_ENV === 'test');

/**
 * This constant defines whether error handling should be enabled. Defaults to true.
 */
defined('YII_ENABLE_ERROR_HANDLER') or define('YII_ENABLE_ERROR_HANDLER', true);


//接下来依次定义了启动时间、yii文件路径、是否启动调试、环境、产品环境、开发环境、测试环境、错误处理常量；


class BaseYii
{
//声明BaseYii类，该类没有父类；
public static $classMap = [];

public static $app;

public static $aliases = ['@yii' => __DIR__];

public static $container;

//定义了四个静态属性：
/*public static $classMap = [];用赋值为空数组的方式声明；根据注解理解该属性被用于Yii的自动加载机制（used by the Yii autoloading mechanism），键名为类名称，键值为对应的路径或者路径别名

public static $app; 该属性为应用实例；

public static $aliases = ['@yii' => __DIR__]; 该属性为路径别名；

public static $container; 该属性为依赖注入容器；
*/

 // 获取版本号方法：
 
  public static function getVersion()
    {
        return '2.0.7';
    }
	
 //接下来的方法是通过路径别名获取路径，想知道如何获取路径，首先需要知道如何设置路径别名，所以先阅读设置路径别名的方法：	

public static function setAlias($alias, $path)
    {
        if (strncmp($alias, '@', 1)) {
　　　　　　　//判断别名是否以@开始，如果不是，则添加@开头
            $alias = '@' . $alias;
        }
　　　　　　//通过/的位置获取根别名，如果别名中没有/，则别名就是根别名，否则截取/前面的作为根别名
        $pos = strpos($alias, '/');
        $root = $pos === false ? $alias : substr($alias, 0, $pos);
        if ($path !== null) {
　　　　　　　　//通过三元运算符判断路径中是否包含别名，如果包含，调用getAlias解析别名，否则去掉路径右边的斜线  到这里才知道为什么getAlias方法会在前面了
　　　　　　　　　//strncmp 用来比较两个字符串的指定长度，相等返回0
            $path = strncmp($path, '@', 1) ? rtrim($path, '\\/') : static::getAlias($path);
            if (!isset(static::$aliases[$root])) {//如果还没有设置过这个根别名
                if ($pos === false) {
                    static::$aliases[$root] = $path;//在别名数组中添加该根别名，键名为根别名，值为对应的路径
                } else {
                    static::$aliases[$root] = [$alias => $path];//否则，路径为对应的一个数组
                }
            } elseif (is_string(static::$aliases[$root])) {//如果注册过根别名，即根别名对应的值为字符串
                if ($pos === false) {
                    static::$aliases[$root] = $path;//当前注册的是根别名，则覆盖原来的值
                } else {//否则，把当前的别名和根别名添加到数组中
                    static::$aliases[$root] = [
                        $alias => $path,
                        $root => static::$aliases[$root],
                    ];
                }
            } else {//添加别名到根别名数组
                static::$aliases[$root][$alias] = $path;
                krsort(static::$aliases[$root]);//按照键名降序排序
            }
        } elseif (isset(static::$aliases[$root])) {
　　　　　　　　　　//如果是根别名数组，删除子别名，机制类似于TP中的缓存方法和配置方法
            if (is_array(static::$aliases[$root])) {
                unset(static::$aliases[$root][$alias]);
            } elseif ($pos === false) {
　　　　　　　　　　　　//删除整个根别名数组
                unset(static::$aliases[$root]);
            }
        }
    }
	
	
//通过别名获取路径的方法：
public static function getAlias($alias, $throwException = true){
        if (strncmp($alias, '@', 1)) {
            //判断$alias中的第一个字符是否为@，如果不是@，则传入的参数不是别名，不做处理返回参数本身；
            return $alias;
        }
　　　　　　 //通过/获取根别名
        $pos = strpos($alias, '/');
        $root = $pos === false ? $alias : substr($alias, 0, $pos);

        if (isset(static::$aliases[$root])//判断别名常量中是否存在该别名) {
            if (is_string(static::$aliases[$root]//判断根别名的值是否为字符串，如果是字符串，表示只设置了一个根别名)) {
　　　　　　　　　　　//通过三元运算符判断如果取得别名是根别名，直接返回根别名路径，否则返回根别名+去掉根别名的路径
                return $pos === false ? static::$aliases[$root] : static::$aliases[$root] . substr($alias, $pos);
            } else {
　　　　　　　　　　//如果根别名的值不是字符串，表示设置了子别名，遍历子别名
                foreach (static::$aliases[$root] as $name => $path) {
                    if (strpos($alias . '/', $name . '/') === 0) {
                        return $path . substr($alias, strlen($name));
                    }
                }
            }
        }
　　　　　//如果输入的别名有异常，返回false
        if ($throwException) {
            throw new InvalidParamException("Invalid path alias: $alias");
        } else {
            return false;
        }
    }

	
	
 
public static function getRootAlias($alias)//获取根别名
    {　　//查找别名中斜线的位置
        $pos = strpos($alias, '/');
　　　　　　　　//根据斜线的结果判断，如果不包含斜线，表示输入为根别名，否则截取斜线前面的部分作为根别名
        $root = $pos === false ? $alias : substr($alias, 0, $pos);
　　　　　　　//判断根别名是否存在
        if (isset(static::$aliases[$root])) {
            if (is_string(static::$aliases[$root])) {//判断根别名的值即路径是否为字符串，如果是，返回根别名
                return $root;
            } else {//否则遍历别名数组，通过查找字符串函数找到根别名，返回
                foreach (static::$aliases[$root] as $name => $path) {
                    if (strpos($alias . '/', $name . '/') === 0) {
                        return $name;
                    }
                }
            }
        }

        return false;
    }
	
	




//类自动加载方法：

public static function autoload($className)
    {
        if (isset(static::$classMap[$className])) {//判断传入的类是否在定义的$classMap数组常量中
            $classFile = static::$classMap[$className];//如果在，则类的路径为类名对应的路径即数组的值
            if ($classFile[0] === '@') {//取路径的第一个字符判断是否为@，如果是，则包含别名
                $classFile = static::getAlias($classFile);//解析别名作为类文件路径
            }
        } elseif (strpos($className, '\\') !== false) {//如果传入的类名不在$classMap数组中，且传入的类名为路径
            $classFile = static::getAlias('@' . str_replace('\\', '/', $className) . '.php', false);//拼接出类文件路径，支持别名
            if ($classFile === false || !is_file($classFile)) {//如果类文件不存在，则返回
                return;
            }
        } else {//路径不正确，返回
            return;
        }

        include($classFile);//包含类文件

        if (YII_DEBUG && !class_exists($className, false) && !interface_exists($className, false) && !trait_exists($className, false)) {
            throw new UnknownClassException("Unable to find '$className' in file: $classFile. Namespace missing?");//判断类是否存在，不存在抛出异常
        }
    }

	

//创建对象方法：
public static function createObject($type, array $params = [])
    {
        if (is_string($type)) {//判断输入的参数$type是否为字符串
            return static::$container->get($type, $params);//如果是字符串，调用$container 的get方法获取对象并返回
        } elseif (is_array($type) && isset($type['class'])) {//判断参数$type是否为数组，并且数组中是否有类名称
            $class = $type['class'];//如果有，则类名为数组中class键的值
            unset($type['class']);//注销$type 中的类名称作为下面的配置参数--详见get方法
            return static::$container->get($class, $params, $type);//通过类名称获取对象
        } elseif (is_callable($type, true)) {//判断参数$type是否为可调用的函数
            return call_user_func($type, $params);//调用函数并返回
        } elseif (is_array($type)) {//参数$type是数组但不包含类名，抛出异常
            throw new InvalidConfigException('Object configuration must be an array containing a "class" element.');
        } else {//输入不合法，抛出异常
            throw new InvalidConfigException('Unsupported configuration type: ' . gettype($type));
        }
    }	
	

	
	


//获取日志记录方法：
private static $_logger;//声明静态变量

    /**
     * @return Logger message logger
     */
    public static function getLogger()
    {
        if (self::$_logger !== null) {//如果当前的静态变量不为空，返回$_logger
            return self::$_logger;
        } else {
            return self::$_logger = static::createObject('yii\log\Logger');//否则，返回yii\log\Logger方法
        }
    }


//设置日志记录方法：

public static function setLogger($logger)
    {
        self::$_logger = $logger;//将传入的$logger赋值给静态变量$_logger
    }	


//日志记录trace信息方法：

public static function trace($message, $category = 'application')//参数为trace信息和信息类型
    {
        if (YII_DEBUG) {//如果定义的YII_DEBUG
            static::getLogger()->log($message, Logger::LEVEL_TRACE, $category);//通过logger类中的log方法输出trace信息
        }
    }

//日志记录error信息方法：

 public static function error($message, $category = 'application')//参数为错误信息和信息类型
     {
         static::getLogger()->log($message, Logger::LEVEL_ERROR, $category);//通过logger类中的log方法输出error信息

 }

//操作信息日志：
 public static function info($message, $category = 'application')//参数为操作消息和消息类型
     {
         static::getLogger()->log($message, Logger::LEVEL_INFO, $category);//输出日志
     }

//开始性能分析方法：
  public static function beginProfile($token, $category = 'application')
     {
         static::getLogger()->log($token, Logger::LEVEL_PROFILE_BEGIN, $category);//输出性能分析开始记录
     }

//结束性能分析方法：
  public static function endProfile($token, $category = 'application')
     {
         static::getLogger()->log($token, Logger::LEVEL_PROFILE_END, $category);//输出性能分析结束记录
     }

//输出power信息方法：
 public static function powered()
     {
         return \Yii::t('yii', 'Powered by {yii}', [
             'yii' => '<a href="http://www.yiiframework.com/" rel="external">' . \Yii::t('yii',
                     'Yii Framework') . '</a>'
         ]);//返回power by 信息
     }


//短方法t（语言翻译方法）：
 public static function t($category, $message, $params = [], $language = null)//\yii\i18n\I18N::translate()方法的短方法
     {
         if (static::$app !== null) {//如果 \yii\console\Application|yii\web\Application 实例为空
             return static::$app->getI18n()->translate($category, $message, $params, $language ?: static::$app->language);
　　　　　　　　　　　　　　　　//调用translate（）方法，用$params中的值替换$message中对应的值，$language为空，采用默认语言　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
         } else {
             $p = [];
             foreach ((array) $params as $name => $value) {//否则，遍历$params
                 $p['{' . $name . '}'] = $value;//以$params 的名和值构建索引数组
             }
 
             return ($p === []) ? $message : strtr($message,      $p);//如果构建的数组值为空，返回输入的信息，否则用构建的数组的值替换$message中的值然后返回
         }
     }



//配置方法：
 public static function configure($object, $properties)
    {
        foreach ($properties as $name => $value) {
            $object->$name = $value;//将对象的属性按键值对的形式配置
        }

        return $object;
    }


//返回对象中变量的方法：

public static function getObjectVars($object)
    {
        return get_object_vars($object);//返回某个对象中的公共属性
    }

 //BaseYii.php结束。	


	