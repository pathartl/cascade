module.exports = function(grunt) {

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.initConfig({
		// Sass
		scss: {
			style: {
				options: {
					style: 'compressed'
				},
				files: [{
					expand: true,
					cwd: 'scss',
					src: ['**/*.scss'],
					dest: 'build',
					ext: '.css'
				}]
			}
		},
		autoprefixer: {
			style: {
				options: {
					browsers: ['ie >= 9',
							 'last 2 Chrome versions',
							 'last 2 ChromeAndroid versions',
							 'Android > 0',
							 'Firefox >= 31',
							 'last 2 Safari versions',
							 'last 2 ExplorerMobile versions'],
					map: true
				},
				files: [{
					expand: true,
					cwd: 'build',
					src: ['*.css'],
					dest: '',
					ext: '.css'
				}]
			}
		},
		watch: {
			scss: {
				files: ['scss/**/*.scss'],
				tasks: ['scss:style', 'autoprefixer:style'],
				options: {
					livereload: true
				}
			},
			php: {
				files: ['**/*.php'],
				options: {
					livereload: true
				}
			}
		},
	});

	grunt.registerTask('build', ['scss', 'autoprefixer']);
	grunt.registerTask('default', ['watch']);
};