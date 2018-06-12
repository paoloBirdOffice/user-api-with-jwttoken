# User Api platform With JWT token Skeleton
* User Api platform With JWT token Skeleton
* System using DDD architecture & Symfony 4

    install docker
    sudo docker-compose up
    sudo docker-compose exec php-fpm bash
    bin/console d:s:u --force
    
    
    
##URL

   ### Main url : http://localhost:8000/api
   
   ### create User : http://localhost:8000/api/users
   ####HEADER
        Content-Type : application/json
   ####Body    
        {
          "fullname": "strings",
          "username": "strings",
          "usernameCanonical": "strings",
          "email": "strings",
          "emailCanonical": "strings",
          "plainPassword": "strings",
          "lastLogin": "2018-06-12T14:37:31.902Z",
          "confirmationToken": "stringz",
          "enabled": true,
          "superAdmin": true,
          "passwordRequestedAt": "2018-06-12T14:37:31.902Z"
        }
   
   ### Login User : http://localhost:8000/login_check
   ####Body    
        form-data
        
        _username: string
        _password: string
        

