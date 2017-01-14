<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['state_id'])) {
  redirect_to('index.php');
}

$errors = array();
$territory = array(
  'name' => '',
  'state_id' => h($_GET['state_id']),
  'position' => '',
);

if (is_post_request()) {
  if(isset($_POST['name'])) { $territory['name'] = h($_POST['name']); }
  if(isset($_POST['state_id'])) { $territory['state_id'] = h($_POST['state_id']); }
  if(isset($_POST['position'])) { $territory['position'] = h($_POST['position']); }

  $result = insert_territory($territory);
  if ($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . u($new_id));
  } else {
    $errors = $result;
  }

}
?>
<?php $page_title = 'Staff: New Territory'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../states/show.php?id=<?php echo u($territory['state_id']) ?>">Back to State Details</a><br />

  <h1>New Territory</h1>

  <?php echo display_errors($errors); ?>

  <form action="new.php?state_id=<?php echo $territory['state_id']; ?>" method="post">
    Name:<br />
    <input type="text" name="name" value="<?php echo $territory['name']; ?>" /><br />
    Position:<br />
    <input type="text" name="position" value="<?php echo $territory['position']; ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
