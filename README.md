<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
        <img src="https://png.icons8.com/metro/1600/plus-math.png" height="50px">
        <img src="https://vuejs.org/images/logo.png" height="100px">
    </a>
    <h1 align="center">Yii 3 + Vue.js Project Template</h1>
    <br>
</p>

This is a skeleton [Vue.js](https://vuejs.org/) application integrated with [Yii 3](http://www.yiiframework.com/) as a backend.

The template contains examples of using Vue.js and Yii3 including ajax request with enabled CSRF.

DIRECTORY STRUCTURE
-------------------

      app/                contains all vue.js templates
      config/             contains application configurations
      src/
        assets/             contains assets definition
        commands/           contains console commands (controllers)
        controllers/        contains Web controller classes
        mail/               contains view files for e-mails
        models/             contains model classes
        views/              contains view files for the Web application
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.1.0. and you have node.js and yarn installed

If you do not have **Node.js** installed you can [install it by following instructions](https://nodejs.org/en/download/)

If you do not have **Yarn** installed you can [install it by following instructions](https://yarnpkg.com/lang/en/docs/install/)

INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar create-project --prefer-dist --stability=dev developeruz/yii-vue-app basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~
If you have a problem with `babel-loader` please run:
~~~
npm cache clean -f
rm -rf node_modules/ package-lock.json
npm install
yarn dev
~~~

CONFIGURATION
-------------

Please, check the [Yii Basic Web Project Template](https://github.com/yiisoft/yii2-web-basic#configuration) configuration section. 

CREATE VUE.JS TEMPLATE
----------------------

You can run console command to get a basic vue.js template for your components
~~~
php yii make/template --path=app/pages/TestComponent.vue
~~~

It will create a file TestComponent.vue with the following content 
```
 <template>
     <div>
 
     </div>
 </template>
 
 <script>
     export default {
         data() {
             return {
             }
         },
         mounted: function () {
 
         },
         methods: {
 
         },
         watch: {
 
         }
     }
 </script>
``` 


CONTRIBUTING
-----------------------

Contributions are **welcome** and will be fully **credited**.
