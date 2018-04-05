/* global module require process */
module.exports = function(grunt) {
  var path = require("path");

  require("load-grunt-config")(grunt, {
    configPath: path.join(process.cwd(), "grunt/config"),
    jitGrunt: {
      customTasksDir: "grunt/tasks",
      staticMappings: {
        makepot: "grunt-wp-i18n"
      }
    },
    data: {
      i18n: {
        author: "Sérgio Santos <me@s3rgiosan.com>",
        support: "https://github.com/vint3creative/remove-projects-in-divi",
        pluginSlug: "remove-projects-in-divi",
        mainFile: "remove-projects-in-divi",
        textDomain: "remove-projects-in-divi",
        potFilename: "remove-projects-in-divi"
      },
      badges: {
        packagist_stable:
          "[![Latest Stable Version](https://poser.pugx.org/vint3/remove-projects-in-divi/v/stable)](https://packagist.org/packages/vint3/remove-projects-in-divi)",
        packagist_downloads:
          "[![Total Downloads](https://poser.pugx.org/vint3/remove-projects-in-divi/downloads)](https://packagist.org/packages/vint3/remove-projects-in-divi)",
        packagist_license:
          "[![License](https://poser.pugx.org/vint3/remove-projects-in-divi/license)](https://packagist.org/packages/vint3/remove-projects-in-divi)",
        codacy_grade:
          "[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b8a3607fa0c740fa8c93a9235918fd4e)](https://www.codacy.com/app/s3rgiosan/remove-projects-in-divi?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=vint3creative/remove-projects-in-divi&amp;utm_campaign=Badge_Grade)",
        codeclimate_grade:
          "[![Code Climate](https://codeclimate.com/github/vint3creative/remove-projects-in-divi/badges/gpa.svg)](https://codeclimate.com/github/vint3creative/remove-projects-in-divi)"
      }
    }
  });
};
