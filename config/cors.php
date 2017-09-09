<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Laravel CORS
     |--------------------------------------------------------------------------
     |

     | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*') 
     | to accept any value, the allowed methods however have to be explicitly listed.
     |
     */
  //  'supportsCredentials' => false,
  //  'allowedOrigins' => ['*'],
  //  'allowedHeaders' => ['*'],
  //  'allowedMethods' => ['GET', 'POST', 'PUT',  'DELETE'],
  //  'exposedHeaders' => [],
  //  'maxAge' => 0,
  //  'hosts' => [],


  'supportsCredentials' => false,
    'allowedOrigins' => ['http://localhost:3000'],
    'allowedHeaders' => ['Accept,Content-Type'],
    'allowedMethods' => ['GET','PUT','POST','DELETE','OPTIONS'],
    'exposedHeaders' => [],
    'maxAge' => 0,
    'hosts' => [],



];

