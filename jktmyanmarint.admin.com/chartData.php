<?php
header('Content-Type: application/json');

include("confs/config.php");

// $sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";

$selectedId = $_POST["selectedId"];
$currentShowing = $_POST["currentShowing"];

switch ($currentShowing) {
	case "stuByMonths": {
			switch ($selectedId) {
				case "1": {
						$sqlQuery = "SELECT
				DATE_FORMAT(`created_at`, '%Y-%M') as `date`,
				COUNT(*) as `count`
				FROM `enrollments`
				WHERE `created_at` < Now() and `created_at` > DATE_ADD(Now(), INTERVAL- 5 MONTH) 
				GROUP BY MONTH(`created_at`)
				ORDER BY `date` DESC
				";
						$result = mysqli_query($conn, $sqlQuery);
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
						$firstEle = array_shift($data);
						$data[] = $firstEle;
						echo json_encode($data);
					}
					break;
				case "2": {
						$sqlQuery = "SELECT
				DATE_FORMAT(`created_at`, '%Y-%M') as `date`,
				COUNT(*) as `count`
				FROM `enrollments`
				WHERE `created_at` < Now() AND YEAR(created_at) = YEAR(CURDATE())
				GROUP BY MONTH(`created_at`)
				ORDER BY `date` ASC
				";
						$result = mysqli_query($conn, $sqlQuery);
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
						echo json_encode($data);
					}
					break;
				default: {
						$sqlQuery = "SELECT
				DATE_FORMAT(`created_at`, '%d-%m-%Y') as `date`,
				COUNT(*) as `count`
				FROM `enrollments`
				WHERE `created_at` < Now() AND MONTH(created_at) = MONTH(CURDATE())
				GROUP BY MONTH(`created_at`)
				ORDER BY `date` ASC
				";

						$result = mysqli_query($conn, $sqlQuery);
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
						echo json_encode($data);
					}
			}
		}
		break;
	case "stuByCourses": {
			switch ($selectedId) {
				case "1": {
						$sqlQuery = "SELECT cty.title AS category, 
						COUNT(*) as count FROM courses c, 
						categories cty, enrollments e 
						WHERE c.category_id = cty.category_id
						AND e.is_pending = 0 
						AND e.course_id = c.course_id
						AND e.created_at < Now() 
						AND e.created_at > DATE_ADD(Now(), INTERVAL- 5 MONTH)
						GROUP BY category";

						$result = mysqli_query($conn, $sqlQuery);
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
						$firstEle = array_shift($data);
						$data[] = $firstEle;
						echo json_encode($data);
					}
					break;
				case "2": {
						$sqlQuery = "SELECT cty.title AS category, 
						COUNT(*) as count FROM courses c, 
						categories cty, enrollments e 
						WHERE c.category_id = cty.category_id 
						AND e.is_pending = 0
						AND e.course_id = c.course_id
						AND e.created_at < Now() 
						AND YEAR(e.created_at) = YEAR(CURDATE())
						GROUP BY category";
						$result = mysqli_query($conn, $sqlQuery);
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
						echo json_encode($data);
					}
					break;
				default: {
						$sqlQuery = "SELECT cty.title AS category, 
						COUNT(*) as count FROM courses c, 
						categories cty, enrollments e 
						WHERE c.category_id = cty.category_id 
						AND e.is_pending = 0
						AND e.course_id = c.course_id
						AND e.created_at < Now() 
						AND MONTH(e.created_at) = MONTH(CURDATE())
						GROUP BY category";

						$result = mysqli_query($conn, $sqlQuery);
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
						echo json_encode($data);
					}
			}
		}
		break;
	case "showPayments": {
			switch ($selectedId) {
				case "1": {
						$sqlQuery = "SELECT
						DATE_FORMAT(`created_at`, '%Y-%M-%d') as `date`,
						SUM(payment_amount) as `sum`
						FROM `payments`
						WHERE `created_at` < Now() 
						AND `created_at` > DATE_ADD(Now(), INTERVAL- 5 MONTH)
						GROUP BY `date`
						ORDER BY `created_at` ASC";

						$result = mysqli_query($conn, $sqlQuery);
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
						echo json_encode($data);
					}
					break;
				case "2": {
						$sqlQuery = "SELECT
						DATE_FORMAT(`created_at`, '%Y-%M-%d') as `date`,
						SUM(payment_amount) as `sum`
						FROM `payments`
						WHERE `created_at` < Now() 
						AND YEAR(`created_at`) = YEAR(CURDATE())
						GROUP BY `date`
						ORDER BY `created_at` DESC";
						$result = mysqli_query($conn, $sqlQuery);
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
						echo json_encode($data);
					}
					break;
				default: {
						$sqlQuery = "SELECT
						DATE_FORMAT(`created_at`, '%Y-%M-%d') as `date`,
						SUM(payment_amount) as `sum`
						FROM `payments`
						WHERE `created_at` < Now() 
						AND MONTH(`created_at`) = MONTH(CURDATE())
						GROUP BY `date`
						ORDER BY `created_at` DESC";

						$result = mysqli_query($conn, $sqlQuery);
						$data = array();
						foreach ($result as $row) {
							$data[] = $row;
						}
						echo json_encode($data);
					}
			}
		}
		break;
	default: {
			echo "Sorry Bad Request";
		}
}


mysqli_close($conn);


// query test
// SELECT categories.title as `category`, COUNT(*) as `count` FROM `enrollments` JOIN `courses` ON enrollments.enrollment_id = courses.course_id JOIN `categories` ON categories.category_id = courses.course_id GROUP BY `category`;


// SELECT cty.title AS category, COUNT(*) as count FROM courses c, categories cty, enrollments e WHERE c.category_id = cty.category_id AND e.course_id = c.course_id GROUP BY category ORDER BY count ASC;

// SELECT
// DATE_FORMAT(`created_at`, '%Y-%M-%d') as `date`,
// SUM(payment_amount) as `sum`
// FROM `payments`
// GROUP BY `date`
// ORDER BY `created_at` DESC;