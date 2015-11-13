

In this application we worked with the MVC Design pattern: Model View Controller


ROOTFOLDER
	-app:					// the application classes and logics 
		-controllers:		// Render views and call models 
		-lib:				// Main classes
			App :			// Registry
			Router :		// Call a specific controller and passing the arguments from URL
			Helper :		// Filter inputs and debuging features
			Controller:		// Main controller
			Model :			// Active Record 
		-models:			// Customize the logic business
		-tpls:				// the views templates
		-views:				// Views folders and files
	-documentation: 		// Documentation files
	-public:				// the only one directory accessed via HTTP request, it contains index.php file and (css, js, images) directories:
	-storage:			// store all sessions and caches files here
	-vendor	:			// Containes the autolod file and third party API
	.htaccess :			// Redirection 
	composer.json :		// It used to autoload classes in the App namespace
	labstructure.sql :	// tables in database (users, posts, categories) 
	phpunit.xml: 		// PHPUnit tests config
	README.md : 		// for github 