# Escape Room
## Requirements
* PHP(8.2.6)
* Composer(2.5.7)
* Laravel(10.12.0)

## Installation
* Getting Project
  </br>
  ```
    git clone git@github.com:sahanaliosman/escape-room.git
  ```
  </br>
* Run Migrations 
  </br>
  ```
  php artisan migrate  
  php artisan migrate --database=testing
  ```
  Say 'yes' to 'Would you like to create it?' question. For creating new databases when first install.
  </br>
    
  </br>
* Run Seeders
  </br>
  
  ```
    php artisan db:seed --class=UserSeeder
    php artisan db:seed --class=EscapeRoomSeeder  
    php artisan db:seed --class=UserSeeder --database=testing
    php artisan db:seed --class=EscapeRoomSeeder --database=testing 
    
  ```
  that's all.
  </br>


## Running
### Project
* In project folder, run this command:
  </br>
  ```
    php artisan serve 
  ```

### Tests
* In project folder, run this command:
  </br>
  ```
    vendor/bin/phpunit
  ```

## Endpoints
* Auth
  </br>
  ```
    GET /api/auth/register
     * Request Parameters
       - name
       - email
       - passwword
       - birthdate(Y-m-d)
     * Response Parameters
       - status
       - message
       - token
  
    GET /api/auth/login
     * Request Parameters
       - email
       - password
     * Response Parameters
       - status
       - message
       - token
  ```
  
* Escape-Room
  </br>
  ```
    GET /api/escape-rooms
    
    GET /api/escape-rooms/{id}
    
    GET /api/escape-rooms/{id}/time-slots
  ```
  
* Booking
  </br>
  ```
    GET /api/bookings
    
    POST /api/bookings
     * Request Parameters
       - room_id
       - time_slot_id
       - booking_date(Y-m-d)
       - participants(integer count)
     * Response Parameters
       - status
       - message
       - details
         - room_name
         - user_name
         - time_range
         - booking_date
         - participants
         - birthday_discount
  
    DELETE api/bookings/{id}
    
  ```

## Note

* You can test with Postman file included in project
* Test variables after seeds;
  * email: sahanaliosman@gmail.com
  * password: 123456
* You should login and get token.
* This token is bearer-token for all other endpoints but all authentication processes. Auth endpoints don't need bearer-token.

