<?php 

function createXMLfile($booksArray){
  
    $filePath = 'book.xml';
 
    $dom     = new DOMDocument('1.0', 'utf-8'); 
 
    $root      = $dom->createElement('books'); 
 
    for($i=0; $i<count($booksArray); $i++){
      
      $bookId        =  $booksArray[$i]['id'];  
 
      $bookName      =   htmlspecialchars($booksArray[$i]['title']);
 
      $bookAuthor    =  $booksArray[$i]['author_name']; 
 
      $bookPrice     =  $booksArray[$i]['price']; 
 
      $bookISBN      =  $booksArray[$i]['ISBN']; 
 
      $bookCategory  =  $booksArray[$i]['category'];  
 
      $book = $dom->createElement('book');
 
      $book->setAttribute('id', $bookId);
 
      $name     = $dom->createElement('title', $bookName); 
 
      $book->appendChild($name); 
 
      $author   = $dom->createElement('author', $bookAuthor); 
 
      $book->appendChild($author); 
 
      $price    = $dom->createElement('price', $bookPrice); 
 
      $book->appendChild($price); 
 
      $isbn     = $dom->createElement('ISBN', $bookISBN); 
 
      $book->appendChild($isbn); 
      
      $category = $dom->createElement('category', $bookCategory); 
 
      $book->appendChild($category);
  
      $root->appendChild($book);
 
    }
 
    $dom->appendChild($root); 
 
    $dom->save($filePath); 
 
  } 
  function to_xml(SimpleXMLElement $object, array $data)
{   
   
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $new_object = $object->addChild($key);
            to_xml($new_object, $value);
        } else {
            // if the key is an integer, it needs text with it to actually work.
            if ($key != 0 && $key == (int) $key) {
                $key = "key_$key";
            }

            $object->addChild($key, $value);
        }   
    }   
}  
$dom     = new DOMDocument('1.0', 'utf-8'); 
$root      = $dom->createElement('transaction'); 
 foreach($res as $booksArray){
  print_r($booksArray);
  $bookId        =  $booksArray['propertyid'];  
  $bookName = htmlspecialchars($booksArray['propertyname']);
  $bookAuthor    =  $booksArray['RoomID']; 
  $bookPrice     =  $booksArray['Description']; 
  $bookISBN      =  $booksArray['Capacity']; 
  $bookCategory  =  $booksArray['PhotoURL'];  
  $book = $dom->createElement('Property');
  $book->setAttribute('propertyid', $bookId);
  $name     = $dom->createElement('propertyname', $bookName); 
  $book->appendChild($name); 
  $author   = $dom->createElement('RoomID', $bookAuthor); 
  $book->appendChild($author); 
  $price    = $dom->createElement('Description', $bookPrice); 
  $book->appendChild($price); 
  $isbn     = $dom->createElement('Capacity', $bookISBN); 
  $book->appendChild($isbn); 
  
  $category = $dom->createElement('PhotoURL', $bookCategory); 
  $book->appendChild($category);

  
}
$dom->appendChild($root); 
$dom->saveXML($filePath); 
print_r($dom->saveXML());


function graphqlQuery($endPoint, $query, $accessToken)
{
 $response = new Client([
      'base_uri' => $endPoint,
      'headers' => [
          'Authorization' => 'Bearer '.$accessToken,
          'Content-Type' => 'application/json',
      ],
      'body' => json_encode([
          'query' => $query,
      ]),
  ]);

  return new ArrayCollection(json_decode($response->getBody()->getContents(), true));
}


?>