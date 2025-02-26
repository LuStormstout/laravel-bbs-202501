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
