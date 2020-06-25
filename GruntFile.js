module.exports = function(grunt) {
    grunt.initConfig({
       less: {
          development: {
             options: {
                compress: true,
                yuicompress: true,
                optimization: 2
             },
             files: {
                "pub/css/style.css": `assets/less/style.less`
             }
         }
    },
    watch: {
      styles: {
         files: ['assets/**/*.less'],
         tasks: ['less'],
         options: {
            nospawn: true,
         }
      }
   },
    
 });
 grunt.registerTask('default', ['less', 'watch']);
 grunt.loadNpmTasks('grunt-contrib-uglify');
 grunt.loadNpmTasks('grunt-contrib-less');
 grunt.loadNpmTasks('grunt-contrib-watch');

 };