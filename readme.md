## Laravel Demo for CyberCoders

This demo app performs a search for github users.  They are displayed along with any followers.  Followers are displayed in batches of 30 with a "More" button to load additional followers.

This application has a Vue.js frontend which makes call through Axios to a custom API built in Laravel.
This API acts as midleware to consume the GitHub API through the guzzle package.  This allows for data transformation and storing access credentials server side.  It is simple enough that it can be deployed through FTP.


Change these environment variables if you play around with it:

APP_URL=http://example.com/projectname/public

GIT_USER=example_user

GIT_PW=example_pass
