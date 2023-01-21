$hostname ='localhost';
$username ='root';
$password ='';
$db_name = 'blog';

$connexion = mysqli_connect($hostname, $username, $password, $db_name);

if(!connexion){
  echo "bad connexion !";
}
