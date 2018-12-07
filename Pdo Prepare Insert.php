<?php
//////////////////////////////////////////////////////////////
$host = "localhost"; //  Server Name Of Host Location Where Your Database You Can Use Ip Address Like 127.0.0.1  .
$db = "test"; // Put Here Your Database Name Where You Store And Receive Information .
$user = "root"; //Your Server Login User Name
$pass = "usbw"; // Server Login Password by Default "" for Local Pc
$charset = "utf8mb4";// Which Unicode Use To Received And Store Data Opreation utf8mb4m give More Freture than utf8
$port = 3306; //port number of server

$options = [

    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => FALSE,
    PDO::ATTR_PERSISTENT         => true,
];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;$port";

try {
    $pdo = new PDO($dsn,$user,$pass,$options);
    echo "connected";
}

catch (PDOEXCEPTION $e){
echo $e->getMessage();
}










INSERT DATA TO DATABASE WITH PHP PDO CLASS
Many Way To INSERT DATA INTO fbsql_database
1. sql statement with Value Manually set






//////////////////////////////////////////////////////////////////////////////////////
// Example :----: Sql statement with Value Manually set
$sql = " INSERT INTO table_name (name,email) VALUES ('ashik','ashik.mou.909@gmail.com') ";
$stmt = $pdo->prepare($sql);
$stmt->execute(); // Insert Data Successfully If insert Query Statement Is Valid;

///////////////////////////////////////////////////////////////////////////
// Example :----: Sql Statement With Place Holder Value
$sql = " INSERT INTO table_name (name,email) VALUES (?,?)  ";
$stmt = $pdo->prepare($sql); // Before Execute Define Place Holder Value Like $name = "ashik"; $email = "ashik.mou.909@gmail.com" And Then Execute 
$stmt->execute([$name,$email]);// For Insert Data Before Store Or Define Place Holder (??) Variable Value Then Execute Statement 


/////////////////////////////////////////////////////////////////
$sql = " INSERT INTO table_name (name,email) VALUES (?,?)  ";
$stmt = $pdo->prepare($sql); // Before Execute Define Place Holder Value Like $name = "ashik"; $email = "ashik.mou.909@gmail.com" And Then Execute 
$stmt->execute(['ashik','ashik.mou.909@gmail.com']);// For Insert Data Before Store Or Define Place Holder (??) Variable Value Then Execute Statement


//////////////////////////////////////////////////////////////////
$sql = " INSERT INTO table_name (name,email) VALUES (?,?)  ";
$stmt = $pdo->prepare($sql); // Before Execute Define Place Holder Value Like $name = "ashik"; $email = "ashik.mou.909@gmail.com" And Then Execute 
$stmt->execute([$_POST['name'],$_POST['email']]);// You Can Execute Data From Collection A Submited Form Like This Way

/////////////////////////////////////////////////////////////////
$sql = " INSERT INTO table_name (name,email) VALUES (:name,:email) ";
$stmt = $pdo->prepare($sql);
$stmt->execute([':name' => $name,':email' => $email]); // You Can Use Place Holder with Value Passed A Array



//////////////////////////////////////////////////////////////
$data = array(
    'name' => $name,
    'email' = > $email,
);
$sql = " INSERT INTO table_name (name,email) VALUES (:name,:email) ";
$stmt = $pdo->prepare($sql);
$stmt->execute($data);


////////////////////////////////////////////////////////////////
$sql = " INSERT INTO table_name (name,email) VALUES (?,?) ";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':name'=>'ashik',':email'=>'ashik.mou.908@gmail.com'));



//////////////////////////////////////////////////////////////
$name = "ashiks";
$email = "ashik.mou.909@gmail.com";
$sql = " INSERT INTO user (name,email) VALUES (?,?) ";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($name, $email));



////////////////////////////////////////////////////////////////
$sql = " INSERT INTO table_name (name,email) VALUES (?,?) ";
$stmt = $pdo->prepare($sql);
$stmt->execute(array('ashikfdf','ashik@gmail.com'));





///////////////////////////////////////////////////////////////////////
$sql = " INSERT INTO table_name (name,email) VALUES (:name,:email) ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":name",$name);// You Can not Use (':name','ashik') Or (":name",$_POST['name'])
$stmt->bindParam(":email",$email); // You Can not Use (':email','ashik@gmail.com') Or (":email",$_POST['email'])
$stmt->execute();

///////////////////////////////////////////////////////////////////////////
$sql = " INSERT INTO table_name (name,email) VALUES (:name,:email)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name',$name,PDO::PARAM_STR,20);// You Can Use Parameter Data Type PDO::PARAM_BOOL,PDO::PARAM_NULL,PDO::PARAM_INT ,PDO::PARAM_STR . Fourth Parameter Are Length Of Data Specify;
$stmt->bindParam(':email',$email,PDO::PARAM_STR,25);
$stmt->execute();




//////////////////////////////////////////////////////////////////////////
$sql = " INSERT INTO table_name (name,email) VALUES (?,?) ";
$stmt->prepare($sql);
$stmt->bindParam(1,$name,PDO::PARAM_STR,20);
$stmt->bindParam(2,$email,PDO::PARAM_STR,25);
$stmt->execute();


///////////////////////////////////////////////////////////////////////////
$data = array(1 => "name", 2 => "ashik.mou.909@gmail.com");
$sql = " INSERT INTO table_name (name,email) VALUES (?,?)";
$stmt = $pdo->prepare($sql);
foreach ($data as $key => &$value) {
    $stmt->bindParam($key,$value);
}
$insert = $stmt->execute();

if ($insert) {
    echo "Data Insert Successfull";
}



////////////////////////////////////////////////////////////////////////////
$param = array(
    'name' =>'gsmashik',
    'email' => 'ashik.mou.909@gmail.com'
);
$sql = " INSERT INTO user (name,email) VALUES(:name,:email)";
$stmt=$pdo->Prepare($sql);
foreach ($param as $key => &$value) {
    $stmt->bindParam($key,$value);
}
$insert = $stmt->execute();

if ($insert) {
echo "fsv";}




//////////////////////////////////////////////////////////////////////////////
$param = array(
    ':name' =>'gsmashik',
    ':email' => 'ashik.mou.909@gmail.com'
);
$sql = " INSERT INTO user (name,email) VALUES(:name,:email)";
$stmt=$pdo->Prepare($sql);
foreach ($param as $key => &$value) {
    $stmt->bindParam($key,$value);
}
$insert = $stmt->execute();

if ($insert) {
echo "fsv";}

// ////////////////////////////////////////////////////
$sql = " INSERT INTO table_name (name,email) VALUES (?,?)";
$stmt= $pdo->prepare($sql);
$stmt->bindValue(1,'ashik');
$stmt->bindValue(2,'ashik.mou.909@gmail.com');
$stmt->execute();

//////////////////////////////////////////////////


$sql = " INSERT INTO user (name,email) VALUES (:name,:email)";
$stmt= $pdo->prepare($sql);
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':email',$email,PDO::PARAM_STR);

$insert = $stmt->execute();

if ($insert) {
echo "fsv";}



//////////////////////////////////////////////////////////
$sql = " INSERT INTO user (name,email) VALUES (:name,:email)";
$stmt= $pdo->prepare($sql);
$stmt->bindParam(':name',$name,PDO::PARAM_STR,20);
$stmt->bindParam(':email',$email,PDO::PARAM_STR,20);

$insert = $stmt->execute();

if ($insert) {
echo "fsv";}


//////////////////////////////////////////////////////////////////////
$sql = " INSERT INTO user (name,email) VALUES (:name,:email)";
$stmt= $pdo->prepare($sql);
$stmt->bindValue(':name','ashik',PDO::PARAM_STR);//
$stmt->bindValue(':email','ashik.mou.909@gmail.com',PDO::PARAM_STR);//
$insert = $stmt->execute();

if ($insert) {
echo "fsv";}









