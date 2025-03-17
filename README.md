## Laravel BBS

---

### 项目简介

Laravel BBS 是一个基于 Laravel 9.1.* 开发的论坛系统.

### 功能

- 角色
    - 游客, 没有登录的用户
    - 用户, 注册用户, 可以发布帖子、评论、点赞, 但是呢没有管理权限
    - 管理员, 可以管理用户、帖子、评论等
    - 超级管理员, 可以管理管理员, 也可以管理用户、帖子、评论等

- 信息
    - 用户, user 模型, 所有内容都是由用户发布的
    - 话题, topic 模型, 用户可以发布帖子
    - 分类, category 模型, 话题可以归类到分类下
    - 回复, reply 模型, 用户可以评论话题

- 动作
    - 增删改查 CRUD

### 用例

- 游客
    - 可以查看所有话题列表;
    - 可以查看话题详情
    - 可以查看话题评论
    - 可以查看用户信息
    - 可以查看分类下面的话题 ...

- 用户
    - 可以发布话题
    - 可以评论话题
    - 可以点赞话题
    - 可以关注话题
    - 可以关注用户 ...

- 管理员
    - 可以管理用户
    - 可以管理话题
    - 可以管理评论
    - 可以管理分类 ...

- 超级管理员
    - 可以修改网站设置
    - 可以管理管理员
    - 可以管理用户
    - 可以管理话题
    - 可以管理评论
    - 可以管理分类 ...

--- 

### 2025-02-20

- 今天运行的命令
    - touch app/helpers.php 在 app 目录下创建 helpers.php 文件, 用于存放自定义函数
    - composer dump-autoload 重新生成自动加载文件
    - php artisan make:controller PagesController 创建页面控制器
    - rm resources/views/welcome.blade.php 删除 Laravel 默认的欢迎页面
    - composer require laravel/ui:3.4.5 --dev 安装 laravel/ui 包
    - php artisan ui bootstrap 安装 bootstrap 前端框架
    - npm install 安装 npm 依赖
    - npm install resolve-url-loader@^5.0.0 --save-dev --legacy-peer-deps 安装 resolve-url-loader 依赖
    - npm run watch-poll 监听资源文件变化
    - yarn add @fortawesome/fontawesome-free 安装 fontawesome 图标库
    - !!! npm uninstall file-loader schema-utils 卸载 file-loader schema-utils 依赖
    - !!! npm install file-loader@latest schema-utils@latest --save-dev 安装 file-loader schema-utils 依赖
    - !!! npm audit fix --force 强制修复 npm 安全漏洞
    - php artisan ui:auth 安装 laravel/ui 用户认证
    - rm app/Http/Controllers/HomeController.php 删除 HomeController 控制器
    - rm resources/views/home.blade.php 删除 home 视图

### 2.21

- 今天运行的命令
    - php artisan migrate 执行数据迁移
    - composer require "mews/captcha:~3.0" 安装验证码包
    - php artisan vendor:publish --provider='Mews\Captcha\CaptchaServiceProvider' 发布验证码配置文件
    - !!! composer require intervention/image 安装图片处理包
    - MacOS: brew install mailhog 安装 mailhog
    - MacOS: brew services start mailhog 启动 mailhog
    - Windows: scoop install mailhog 安装 mailhog
    - Windows: mailhog 启动 mailhog
    - .env 配置邮件发送
        - MAIL_MAILER=smtp
        - MAIL_HOST=127.0.0.1
        - MAIL_PORT=1025
        - MAIL_USERNAME=null
        - MAIL_PASSWORD=null
        - MAIL_ENCRYPTION=null
        - MAIL_FROM_ADDRESS="hello@example.com"
        - MAIL_FROM_NAME="${APP_NAME}"

### 2.25

- 今天运行的命令
    - php artisan event:generate 生成事件类, 用于监听用户验证邮件成功事件, 我们是先在
      app/Providers/EventServiceProvider.php 中注册事件监听器, 然后在使用该命令自动生成事件类.
    - ⚠️ 需要注意的是如果你的代码书写正确且你的命令成功执行, 但还是在 IDE 里面看不到自动创建的文件夹或者文件的话,
      去文件夹中确认是否生成成功.
    - php artisan make:controller UsersController 创建用户控制器
    - php artisan make:migration add_avatar_and_introduction_to_users_table --table=users 给用户表添加头像和简介字段
    - php artisan migrate 执行数据迁移
    - php artisan make:request UserRequest 创建用户请求类

### 2.26

- 今天运行的命令
    - composer require intervention/image-laravel 安装图片处理包
    - php artisan vendor:publish --provider="Intervention\Image\Laravel\ServiceProvider" 发布图片处理配置文件
    - php artisan make:policy UserPolicy 创建用户策略
    - php artisan make:model Category -m 创建分类模型并且数据迁移文件
    - php artisan migrate 执行数据迁移
    - php artisan make:migration seed_categories_data 创建分类数据迁移文件
    - php artisan migrate 执行数据迁移
    - composer require "summerblue/generator:9.*" --dev 安装代码生成器
    - 我们来分析一下我们的话题/帖子的数据结构
        - 话题/帖子
            - title 字符串(String) 标题
            - body 文本(text) 内容
            - category_id 整数(int) 分类
            - user_id 整数(int) 用户
            - reply_count 整数(int) 回复数
            - view_count 整数(int) 查看数
            - last_reply_user_id 整数(int) 最后回复用户
            - order 整数(int) 排序
            - excerpt 文本(text) 摘要
            - slug 字符串(String) SEO 友好的 URL
    - php artisan make:scaffold Topic --schema="title:string:index,body:text,user_id:bigInteger:unsigned:
      index,category_id:integer:unsigned:index,reply_count:integer:unsigned:default(0),view_count:integer:unsigned:
      default(0),last_reply_user_id:integer:unsigned:default(0),order:integer:unsigned:default(0),excerpt:text:
      nullable,slug:string:nullable" 使用代码生成器生成 Topic 模型相关的代码

## 2025-02-27

- 今天运行的命令
    - php artisan make:seed UsersTableSeeder 创建用户数据填充类
    - php artisan migrate:refresh --seed 刷新数据库并且填充数据
    - composer require "barryvdh/laravel-debugbar:~3.6" --dev 安装调试工具
    - php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider" 发布调试工具配置文件
    - 需要注意的是这个调试工具是在开发环境下使用的, 所以我们需要在 .env 文件中配置 APP_DEBUG=true
    - 如果是生产环境下, 需要关闭调试工具, 需要在 .env 文件中配置 APP_DEBUG=false
    - composer require "summerblue/laravel-active:9.*" 安装处理页面上的标签的 active 类的包

### 2025-02-28

- 下载 Simditor 富文本编辑器
    - [Simditor](https://simditor.tower.im/) 是一个简单的富文本编辑器, 适用于 PC 和移动端, 这个网站中也有详细的使用文档
    - [Simditor GitHub](https://github.com/mycolorway/simditor/releases) 下载最新版本
    - mkdir -p resources/editor/css 创建编辑器的 CSS 文件夹
    - mkdir -p resources/editor/js 创建编辑器的 JS 文件夹
    - 我们将对应的我们需要的 CSS 和 JS 文件放到对应的文件夹中, 然后我们是通过 mix 来编译这些文件的, 所以我们需要在
      webpack.mix.js 中配置, 配置完成后我们需要重新运行 npm run watch-poll 来监听资源文件的变化
    - yarn add jquery 安装 jQuery, 安装完成我们需要在 resources/js/bootstrap.js 中引入 jQuery
    - 安装完成之后运行 npm run watch-poll 来监听资源文件的变化

### 2025-03-03

- 今天运行的命令
    - composer require "mews/purifier:~3.3" 安装 HTML 过滤器
    - php artisan vendor:publish --provider="Mews\Purifier\PurifierServiceProvider" 发布 HTML 过滤器配置文件
    - fetch("http://127.0.0.1:8000/topics", {"headers":{"content-type":"application/x-www-form-urlencoded","
      upgrade-insecure-requests":"1"},"body":"_
      token=yK3i4FGilnfRAh8xoQVRwWSWU3onUYI7Ruu6AuVF&title=dangerous%20content+&category_id=2&body=%3Cscript%3Ealert%28%27%E5%AD%98%E5%9C%A8%20XSS%20%E5%AE%89%E5%85%A8%E5%A8%81%E8%83%81%EF%BC%81%27%29%3C%2Fscript%3E","
      method":"POST","mode":"cors"}); 这个是可以通过浏览器的 console 中通过 xss 攻击给数据库中注入脚本, 在我们安装了扩展并且对入库时的
      $topic->body 进行了过滤之后, 我们再次尝试这个攻击, 发现已经无法注入脚本了

### 2025-03-04

- 今天运行的命令
    - php artisan make:scaffold Reply --schema="topic_id:integer:unsigned:default(0):index,user_id:bigInteger:unsigned:
      default(0):index,content:text" 使用代码生成器生成回复模型相关的代码
    - php artisan migrate:refresh --seed 刷新数据库并且填充数据

### 2025-03-05

- 命令
    - php artisan notifications:table 创建通知数据表
    - php artisan migrate 执行数据迁移
    - php artisan make:migration add_notification_count_to_users_table --table=users 给用户表添加通知字段
    - php artisan migrate 执行数据迁移

### 2025-03-06

- composer require "predis/predis:~1.1" 安装 Predis
- QUEUE_CONNECTION=redis 配置队列
- REDIS_CLIENT=predis 配置 Redis
- composer require "laravel/horizon:~5.9" 安装 Laravel Horizon 队列监控工具
- php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider" 发布 Laravel Horizon 配置文件
- php artisan horizon 启动 Laravel Horizon
- php artisan queue:listen 也可以在命令行中监听队列

### 2025-03-07

- php artisan make:migration rename_content_column_in_replies_table --table=replies 重命名回复表中的 content 字段
- php artisan migrate 执行数据迁移

#### 作业

- 在我们现有的回复基础上, 增加可以评论回复的功能, 也就是回复的回复, 也就是楼中楼的功能
- 回复的评论只需要嵌套一层即可, 不需要无限嵌套
- 我们允许回复的评论的作者可以删除自己的评论, 回复的作者可以删除自己回复下面的评论, 当前话题的作者可以删除回复的评论
- 这个功能也只有发布和删除的功能
- 在现有的 replies 表中增加 parent_id 字段, 用于存储回复的评论的父级 ID, 这条评论的 topic_id 为 0
- 我们不在对应的 topic 里面统计回复的评论数 reply_count, 但是我们要在对应的回复下面显示回复的评论数
- 显示在页面上应该是这样的

```
id = 1 这个是原来的回复
    这个是回复的评论1 id = 自动增长的ID, parent_id = 1, topic_id = 0, user_id = 当前发布评论的用户 ID
    这个是回复的评论2
    这个是回复的评论3
```

### 2025-03-10

#### 基于角色的权限控制

- 游客 -> 没有登录的用户, 可以随便浏览不需要登录的页面, 但是不能发布内容
- 用户 -> 登录的用户, 可以发布内容, 只能管理自己的内容, 不能管理别人的内容
- 管理员 -> 有管理权限的用户, 社区内容的管理者, 可以管理话题, 可以管理评论, 可以管理分类
- 站长 -> 超级管理员, 网站的所有者, 可以管理管理员, 可以管理用户, 可以管理话题, 可以管理评论, 可以管理分类

- composer require 'spatie/laravel-permission:~5.5' 安装权限管理包
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" 发布权限管理配置文件
- php artisan make:migration seed_roles_and_permissions_data 创建角色和权限数据填充类
- php artisan migrate:refresh --seed 刷新数据库并且填充数据
- composer require lab404/laravel-impersonate 安装 impersonate 包, 用于模拟登录
- php artisan vendor:publish 发布 impersonate 配置文件, 选择 Lab404\Impersonate\ImpersonateServiceProvider 后面的数字

- 用户(使用这个网站的所有人) users
- 角色(就是我们对我们网站中的用户进行归纳总结) roles 角色表, 用于存储角色信息
- 权限(针对于我们网站里面的每一个操作, 都可以定义一个权限) permissions 权限表, 用于存储权限信息
    - 用户可以有多个角色 model_has_roles 表, 用于存储用户和角色的关系
    - 角色可以有多个权限 role_has_permissions 表, 用于存储角色和权限的关系
    - 用户可以有多个权限 model_has_permissions 表, 用于存储用户和权限的关系

```PHP
use Spatie\Permission\Models\Role;

$adminRole = Role::create(['name' => 'admin']);
$writerRole = Role::create(['name' => 'writer']); // 创建一个角色
\Spatie\Permission\Models\Permission::create(['name' => 'edit_articles']); // 创建一个权限
$writerRole->givePermissionTo('edit_articles'); // 给角色赋予权限

$user = \App\Models\User::find(1);
$user->assignRole('writer'); // 单个角色

// 多个角色
$user->assignRole(['writer', 'admin']);
$user->assignRole('writer', 'admin');

// 检查用户是否有某个角色
$user->hasRole('writer'); // bool
$user->hasAnyRole(Role::all()); // bool
$user->hasAllRoles(Role::all()); // bool

// 检查角色是否有某个权限
$writerRole->hasPermissionTo('edit_articles'); // bool
// 检查用户是否有某个权限
$user->can('edit_articles'); // bool

// 给用户添加权限
$user->givePermissionTo('edit_articles');
// 获取所有直接权限, 不是用过角色赋予的权限, 而是直接赋予的权限 model_has_permissions 表
$user->getDirectPermissions();
```

### 2025-03-12

- php artisan make:migration add_parent_id_to_replies_table --table=replies 给回复表添加 parent_id 字段
- php artisan migrate 执行数据迁移

#### 梳理一下子评论功能的开发流程

1. 在 replies 表中添加 parent_id 字段, 用于存储回复的评论的父级 ID
2. 在 Reply 模型中添加 child 方法, 用于获取子评论
3. 在 Topic 模型中修改 replies 方法, 用于所有 parent_id 为 0 的回复
4. 在 [RepliesController.php](app%2FHttp%2FControllers%2FRepliesController.php) 中修改 store 方法, 用于存储回复的评论,
   在存储子评论成功后因为会触发 [ReplyObserver.php](app%2FObservers%2FReplyObserver.php) 中的 created 方法,
   因为我们要把所有的子评论也算做当前 topic 的回复数量, 所以我们修改了 [Topic.php](app%2FModels%2FTopic.php) 的计算回复数量的方法
5. 修改 [_reply_list.blade.php](resources%2Fviews%2Ftopics%2F_reply_list.blade.php), 用于显示回复的评论,
   我们在这个中间做了一些页面上的交互优化, 在我们回复完子评论后返回到
   topic 详情页面的时候默认展开当前回复的这个评论的子评论, 在这里我们为了实现这个功能, 我们在成功保存了子评论之后返回到
   topic 详情页面的时候携带了一些参数用来判断是否展开子评论, 我们在 [helpers.php](app%2Fhelpers.php) 中添加了一个函数来判断是否展开子评论
6. 删除子评论, 我们在删除评论的时候需要去判断当前评论是否存在子评论, 如果存在子评论的话我们不允许删除父级评论 (
   当然这个你可以按照你自己的想法去修改, 可以在删除了父级评论之后把当前回复的子回复全部删除)

### 2025-03-13

- composer require "summerblue/administrator:9.*" 安装后台管理工具
- php artisan vendor:publish --provider="Frozennode\Administrator\AdministratorServiceProvider" 发布后台管理工具配置文件
- macOS: command + F 查找, command + R 查找替换
- windows: ctrl + F 查找, ctrl + R 查找替换

1. 安装了 summerblue/administrator 后台管理工具
2. 我们的这个后台管理扩展使用的时候最关键的是要理解它的配置文件, 我们在 [administrator.php](config%2Fadministrator.php)
   中配置了我们的后台管理工具, 在里面的 menu 配置了我们的菜单
3. 对应的 menu 配置中的子项都要在对应的 [administrator](config%2Fadministrator) 中配置, 比如我们的用户管理, 我们在 menu
   中配置了用户管理, 那么我们就要在 users 中配置用户管理的相关信息
4. 我们在 [topics.php](config%2Fadministrator%2Ftopics.php) 中使用了两个方法是定义在 [helpers.php](app%2Fhelpers.php) 中的
5. 我们使用的这个扩展只是众多基于 Laravel 的后台管理工具之一, 你可以根据自己的需求去选择适合自己的后台管理工具,
   ex: https://filamentphp.com/

### 2025-03-14

#### 梳理管理后台的开发

1. 多角色用户权限的概念;
2. 使用 spatie/laravel-permission 来构建一套多用户权限管理系统;
3. 使用授权类的过滤器来全局授权用户;
4. 使用 lab404/laravel-impersonate 来模拟登录, 用于测试用户权限;
5. 为 Horizon 配置多用户权限;
6. 使用 summerblue/administrator 来构建后台管理系统, 实现了用户管理、话题管理、评论管理、分类管理等功能;
7. 使用了 Eloquent 修改器来加密用户密码和修改头像;

#### 侧边栏活跃用户

- 我们先思考一个问题, 什么样的用户是活跃用户? 最近 7 天所有用户的帖子数和评论数比较多的用户
- 因为我们叫做活跃用户, 所以我们应该实时计算, 每一个小时计算一次
- 我们按照得分来排序, 例如发一个帖子得 4 分, 发一个评论得 1 分, 那么我们可以按照得分来排序
- 因为我们需要使用 Redis 来存储这个活跃用户, 所以我们需要在 .env 文件中配置 CACHE_DRIVER=redis
- php artisan make:command CalculateActiveUser --command=bbs:calculate-active-user 创建一个计算活跃用户的命令
- 我们可以通过 php artisan bbs:calculate-active-user 来手动计算活跃用户

### 2025-03-17

- ```* * * * * cd /Library/WebServer/Documents/cod/laravel-project-202501/laravel-bbs-202501 && php artisan schedule:run >> /dev/null 2>&1```
- /Library/WebServer/Documents/cod/laravel-project-202501/laravel-bbs-202501 请注意这个要切换成自己的项目路径
- php artisan make:model Link -m 创建友情链接模型和数据迁移文件
- php artisan migrate 执行数据迁移
- php artisan make:factory LinkFactory 创建友情链接工厂
- php artisan make:seeder LinksTableSeeder 创建友情链接数据填充类
- php artisan migrate:refresh --seed 刷新数据库并且填充数据
- php artisan make:migration add_references 创建一个添加外键的迁移文件
- php artisan migrate 执行数据迁移

#### 今天的做的事情

1. 修复了上周五遗留的一个问题, 就是按照分类查找的时候我们需要同时返回首页上面需要的活跃用户数据
2. 我们创建了定时任务来计算活跃用户, 每小时计算一次, 并且我们可以手动执行这个命令, 这个用到了 Linux 的定时任务 Crontab,
   大家需要自己去了解尝试一下
3. 创建了友情链接模型, 并且创建了友情链接工厂和友情链接数据填充类, 我们找了一些真实存在的网站来填充我们的友情链接,
   当然你们可以按照自己的需求来填充
4. 配置可以在管理后台来管理友情链接
5. 在首页上显示友情链接, 并且需要注意在按照分类显示 topic 的时候我们需要把友情链接也返回到页面上
6. 在 Link 模型中添加了用来查找和缓存友情链接的方法, 用于在首页上显示友情链接
7. 我们还在 LinkObserver 中添加了一个监听器, 用于在友情链接发生变化的时候清除缓存
8. 处理了当用户被删除的时候, 他的所有的话题和评论都被删除的问题, 我们使用的方法是数据库的外键约束, 在用户被删除的时候,
   他的所有的话题和评论都会被删除

#### 作业

- 将我们的这个项目的前台页面改造成 api 接口, 用于提供给移动端使用, 或者是自己用 vue/react/angular 等前端框架以前后端分离的方式来开发
- 大家去学习一下什么是跨域资源共享 (CORS), 以及如何解决跨域问题

#### 推荐的学习资料:
- https://learnku.com/courses/laravel-shop/8.x Laravel 电商实战教程
- https://learnku.com/courses/ecommerce-advance/8.x Laravel 电商进阶教程

#### 自己去了解一些加密方式以及认证协议
- RSA 加密
- JWT 认证协议
- OAuth 认证协议
- SSO 单点登录
- 了解一下什么是 CSRF 攻击, 以及如何防范
- 了解一下什么是 XSS 攻击, 以及如何防范
- 了解一下什么是 SQL 注入, 以及如何防范
- 了解一下什么是 DDOS 攻击, 以及如何防范
- Bearer Token 认证 https://oauth.net/2/bearer-tokens/

