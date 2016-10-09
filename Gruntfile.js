module.exports = function (grunt) {

  var pkg = grunt.file.readJSON('package.json');

  var config = {
    author:      'Sérgio Santos <me@s3rgiosan.com>',
    support:     'https://github.com/vint3creative/remove-projects-in-divi',
    pluginSlug:  'remove-projects-in-divi',
    mainFile:    'remove-projects-in-divi',
    textDomain:  'remove-projects-in-divi',
    potFilename: 'remove-projects-in-divi',
    badges:      {
      codacy: '[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b8a3607fa0c740fa8c93a9235918fd4e)](https://www.codacy.com/app/s3rgiosan/remove-projects-in-divi?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=vint3creative/remove-projects-in-divi&amp;utm_campaign=Badge_Grade)',
    },
  };

  var distFiles = [
    '**',
    '!**/.*',
    '!apigen.neon',
    '!assets/**',
    '!bin/**',
    '!build/**',
    '!bootstrap.php',
    '!CHANGELOG.md',
    '!composer.json',
    '!composer.lock',
    '!Gruntfile.js',
    '!node_modules/**',
    '!package.json',
    '!phpdoc.dist.xml',
    '!phpunit.xml',
    '!phpunit.xml.dist',
    '!README.md',
    '!svn/**',
    '!tests/**',
  ];

  grunt.initConfig({

    pkg: pkg,

    checktextdomain: {
      options: {
        text_domain:    config.textDomain,
        correct_domain: false,
        keywords:       [
          '__:1,2d',
          '_e:1,2d',
          '_x:1,2c,3d',
          'esc_html__:1,2d',
          'esc_html_e:1,2d',
          'esc_html_x:1,2c,3d',
          'esc_attr__:1,2d',
          'esc_attr_e:1,2d',
          'esc_attr_x:1,2c,3d',
          '_ex:1,2c,3d',
          '_n:1,2,4d',
          '_nx:1,2,4c,5d',
          '_n_noop:1,2,3d',
          '_nx_noop:1,2,3c,4d',
          ' __ngettext:1,2,3d',
          '__ngettext_noop:1,2,3d',
          '_c:1,2d',
          '_nc:1,2,4c,5d'
        ]
      },
      files: {
        src: [
          'lib/**/*.php',
          config.mainFile + '.php',
          'uninstall.php'
        ],
        expand: true
      }
    },

    makepot: {
      target: {
        options: {
          cwd:         '',
          domainPath:  '/languages',
          potFilename: config.potFilename + '.pot',
          mainFile:    config.mainFile    + '.php',
          include:     [],
          exclude:     [
            'assets/',
            'bin/',
            'build/',
            'languages/',
            'node_modules',
            'release/',
            'svn/',
            'tests/',
            'tmp',
            'vendor'
          ],
          potComments: '',
          potHeaders:  {
            poedit:                  true,
            'x-poedit-keywordslist': true,
            'language':              'en_US',
            'report-msgid-bugs-to':  config.support,
            'last-translator':       config.author,
            'language-Team':         config.author
          },
          type:            'wp-plugin',
          updateTimestamp: true,
          updatePoFiles:   true,
          processPot:      null
        }
      }
    },

    wp_readme_to_markdown: {
      main: {
        files: {
          'README.md': 'README.txt'
        },
        options: {
          post_convert: function(readme) {
            var badges = '';
            Object.keys(config.badges).forEach(function(key) {
              badges += config.badges[key] + "\n";
            });
            return badges + "\n" + readme;
          },
        },
      },
    },

    clean: {
      main: [
        'build',
      ]
    },

    copy: {
      main: {
        expand: true,
        src:    distFiles,
        dest:   'build/' + config.pluginSlug
      }
    },

    compress: {
      main: {
        options: {
          mode:    'zip',
          archive: './build/' + config.pluginSlug + '-<%= pkg.version %>.zip'
        },
        expand: true,
        src:    distFiles,
        dest:   '/' + config.pluginSlug + '/'
      }
    },

    wp_deploy: {
      deploy: {
        options: {
          plugin_slug: config.pluginSlug,
          build_dir:   'build/' + config.pluginSlug,
          assets_dir:  'assets',
          svn_url:     'https://plugins.svn.wordpress.org/' + config.pluginSlug
        }
      }
    },

  });

  require('load-grunt-tasks')(grunt);

  grunt.registerTask('default', [
    'clean',
    'composer:install',
    'pot',
    'readme',
  ]);

  grunt.registerTask('readme', [
    'wp_readme_to_markdown',
  ]);

  grunt.registerTask('pot', [
    'checktextdomain',
    'makepot',
  ]);

  grunt.registerTask('build', [
    'composer:install:no-dev',
    'composer:dump-autoload:optimize:no-dev',
    'clean',
    'copy',
    'compress',
    'composer:install',
    'composer:dump-autoload:optimize',
  ]);

  grunt.registerTask('deploy', [
    'pot',
    'readme',
    'build',
    'wp_deploy',
    'clean',
  ]);

};
