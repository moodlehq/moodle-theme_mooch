"use strict";

module.exports = function (grunt) {
    // Load all grunt tasks.
    grunt.loadNpmTasks("grunt-contrib-less");
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-contrib-clean");

    grunt.initConfig({
        watch: {
            // If any .less file changes in directory "less" then run the "less" task.
            files: "sitebar/**/*.less",
            tasks: ["less"]
        },
        less: {
            // Production config is also available.
            development: {
                options: {
                    // Specifies directories to scan for @import directives when parsing.
                    // Default value is the directory of the source, which is probably what you want.
                    paths: ["sitebar/"],
                    compress: true
                },
                files: {
                    "style/sitebar.css": "sitebar/sitebar.less"
                }
            },
        },
        clean: {
            // Clean all generated .css files from the style folder but not the two other CSS files.
            css: ["style/sitebar.css"],
            //js: ["yui/build/"]
        }
    });
    // The default task (running "grunt" in console).
    grunt.registerTask("default", ["less"]);
};
