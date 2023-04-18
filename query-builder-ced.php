<?php
class QueryBuilder {
	// for database connection
	private $host;
	private $user;
	private $password;
	private $database;

	private $link = NULL;

	private $query;
	private $result;

	// constructor
	public function __construct($host, $user, $password, $database)
	{
		if (FALSE === ($this->link = mysqli_connect($host, $user, $password, $database))) {
			throw new Exception('Error', mysqli_connect_error());
		}
	}


	public function select($table, $fields = '*')
	{
		$this->query = 'SELECT '.$fields. ' FROM '.$table;
		return $this;
	}


	public function where($where = NULL, $value = NULL)
	{
		$this->query .= ' WHERE '.$where. '='.$value;
		return $this;
	}

	public function orderBy($value = 'id desc')
	{
		$this->query .= ' ORDER BY '.$value;
		return $this;
	}

	// Final method for testing this chaining worked
	public function get()
	{
		$this->result = $this->query;
		return $this->result;
	}

	// Final method return as fetch
	public function fetch()
	{
		if (FALSE === ($this->result = mysqli_query($this->link, $this->query))) {
			throw new Exception('Error Query', $this->query);
		}
		return $this->result;
	}

	// Final method return as object
	public function fetchObject()
	{
		if (FALSE === ($this->result = mysqli_query($this->link, $this->query))) {
			throw new Exception('Error Query', $this->query);
		}
		$this->result = mysqli_fetch_object($this->result);
		return $this->result;
	}

	// Final method return as array
	public function fetchArray()
	{
		if (FALSE === ($this->result = mysqli_query($this->link, $this->query))) {
			throw new Exception('Error Query', $this->query);
		}
		$this->result = mysqli_fetch_array($this->result);
		return $this->result;
	}


	// public function __toString()
	// {
	// 	return $this->result;
	// }
}

try {
	$builder = new QueryBuilder('localhost', 'root', '', 'mydb');

	$result = $builder->select('users')->fetch();
	?>
	<table border="1">
		<thead>
			<tr>
				<th>client id</th>
				<th>First name</th>
				<th>last name</th>
				<th>email</th>
				<th>Joined_datetime</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row = mysqli_fetch_object($result)) : ?>
			<tr>
				<td><?php echo $row->id_user; ?></td>
				<td><?php echo $row->first_name; ?></td>
				<td><?php echo $row->last_name; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->datecreated; ?></td>
				<td></td>
			</tr>
		<?php endwhile; ?>
		</tbody>
	</table>

	<?php
} catch (Exception $e) {
	echo $e->getMessage();
	exit();
}

echo '<h1> <h1>Fetch object</h1>';

try {
	
	$nama = new QueryBuilder('localhost', 'root', '', 'mydb');
	$hasil = $nama->select('users')->where('id_users', 1)->fetchObject();
	echo $hasil->first_name .'<br>';
	echo $hasil->last_name;

} catch (Exception $e) {
	echo $e->getMessage();
	exit();
}

echo '<hr> <h1>Fetch Array</h1>';

try {
	$array = new QueryBuilder('localhost', 'root', '', 'mydb');
	$hasil = $array->select('mydb')->where('id_users', 1)->fetchArray();
	echo $hasil['first_name'];
	echo '<br>';
	echo $hasil['last_name'];
} catch (Exception $e) {
	echo $e->getMessage();
	exit();
}