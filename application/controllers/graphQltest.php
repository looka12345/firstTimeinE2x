<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\Server\StandardServer;
use GraphQL\GraphQL;
use GraphQL\Client;
use GraphQL\Exception\QueryError;
use GraphQL\Query;


class graphQltest extends CI_Controller 
{
    public function index()
    {
       
    }
    public function graphQlTest()
    {
    
        
        
        // Create Client object to contact the GraphQL endpoint
        $client = new Client(
            'http://localhost/testing/testQuery',
            []  // Replace with array of extra headers to be sent with request for auth or other purposes
        );
     
        
        
        // Create the GraphQL query
        $gql = (new Query('pokemon'))
            ->setArguments(['name' => 'Pikachu'])
            ->setSelectionSet(
                [
                    'id',
                    'number',
                    'name',
                    (new Query('attacks'))
                        ->setSelectionSet(
                            [
                                (new Query('special'))
                                    ->setSelectionSet(
                                        [
                                            'name',
                                            'type',
                                            'damage',
                                        ]
                                    )
                            ]
        
                        ),
                    (new Query('evolutions'))
                        ->setSelectionSet(
                            [
                                'id',
                                'number',
                                'name',
                                (new Query('attacks'))
                                    ->setSelectionSet(
                                        [
                                            (new Query('fast'))
                                                ->setSelectionSet(
                                                    [
                                                        'name',
                                                        'type',
                                                        'damage',
                                                    ]
                                                )
                                        ]
                                    )
                            ]
                        )
                ]
            );
        
        // Run query to get results
        try {
            $results = $client->runQuery($gql);
        }
        catch (QueryError $exception) {
        
            // Catch query error and desplay error details
            print_r($exception->getErrorDetails());
            exit;
        }
        
        // Display original response from endpoint
        var_dump($results->getResponseObject());
        
        // Display part of the returned results of the object
        var_dump($results->getData()->pokemon);
        
        // Reformat the results to an array and get the results of part of the array
        $results->reformatResults(true);
        print_r($results->getData()['pokemon']);
    }
    
 public function testQuery()
{
    
}



}


?>