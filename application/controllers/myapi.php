
 <?php 
    // defined('BASEPATH') OR exit('No direct script access allowed');

     class Myapi extends CI_Controller
    {   

    function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->model('../modules/teacher/models/Teacher_Model', 'teacher', true);
		$this->load->model('Auth_Model', 'auth', true);        
    }

    public function login_post()
    {
			$result=array();

    	try {
    		$data['username'] = $this->input->post('username');           
            $data['password'] = md5($this->input->post('password'));
            $login = $this->auth->get_single('users', $data);
                       if (!empty($login)) {
              $result['status']=true;
              $result['message']="sjhdgvf";
              $result['data']=$login;
              }else{
              $result['status']=false;
              $result['message']="bdvfdghf";
              $result['data']=[];
              }

    	} catch (Exception $e) {
              $result['status']=false;
              $result['message']=$e;
              $result['data']=[];
    		
    	}
			echo json_encode($result);
            
    }



    //get student list by class teacher
    // SELECT *, students.id as studentId,enrollments.id as EnrollId FROM `enrollments` INNER JOIN students on enrollments.student_id=students.id where students.school_id="5" and class_id=(select id from classes where teacher_id="2")

    	public function Find_Student()
 	{

 			$data['school_id'] = $this->input->post('school_id');          
            $data['teacher_id'] = $this->input->post('teacher_id');

            

 		$query=$this->db->query('SELECT *, students.id as studentId,enrollments.id as EnrollId FROM `enrollments` INNER JOIN students on enrollments.student_id=students.id where students.school_id=? and class_id=(select id from classes where teacher_id=?)')->result_array();
 		print_r($query);


 		echo"<h1>Hello</h1>";
 	}

     }




?> 




