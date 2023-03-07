# devprox
<b> Download ZIP file and extract it and put the files in directory C:\xampp\htdocs\ if on windows and your using xampp or wamp</b>
## test 1

<li>The form is custom from codepen which they use html5, and css3. </li>
<li> I used xampp to handle my database </li>
<li>create database name : devprox </li>
<li> create table name :people </li>

#### use sql query below or manual create the field in the people table
```
--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `idno` varchar(13) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### if your using xampp, or wamp put your test1 folder in C:\xampp\htdocs\ if your on windows and open your xampp control panel. Make sure your MySql and Apeche is running than open your browser and type this below:
```
http://localhost/test1/

```
you will see the form and test the functioning of the form as required

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

## Test2

<li> I used PHP 8 </li>
<li>create database name : devprox2 </li>

### if your using xampp, or wamp put your test2 folder in C:\xampp\htdocs\ if your on windows and open your xampp control panel. Make sure your MySql and Apeche is running than open your browser and type this below:

```
http://localhost/test2/

```
The page that will open is for generating CSV file and the output.csv will be saved in C:\xampp\htdocs\test2 file 

### To upload the CSV file data on the database go to this localhost link below:

```
http://localhost/test2/upload/

```

Select to upload file and the output.csv file is at C:\xampp\htdocs\test2 file and click upload file.



#NOTICE

1. Make sure that you write the correct localhost name, username, password, and database name in submit-form.php script in test1 folder and in test2 folder edit import.php script
