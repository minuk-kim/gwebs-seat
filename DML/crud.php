<?php
class Crud {
  //private = 외부에서 접근 불가능하고, 상속받은 자식도 접근할 수 없는 변수
  //protected = 외부에서 접근 불가능하고, 상속받은 자식은 접근 가능한 변수,함수 등
  //public = 외부에서 접근 가능하고, 상속받은 자식도 가능
  public $connect;
  private $host="localhost";
  private $username="root";
  private $password="120805";
  private $database="gwsdb";

  //action.php에서 객체를 생산(new Crud)하면 실행됨
  function __construct() {
    $this->database_connect();//객체가 생성되면 DB에 연결된다
  }

  //DB연결 구문 호출
  public function database_connect() {
    $this->connect=mysqli_connect($this->host, $this->username, $this->password, $this->database);
  }
  //쿼리를 실행
  public function execute_query($query) {
    return mysqli_query($this->connect, $query);
  }

  //데이터 조회(어드민)
  public function get_admin_data_in_table($query) {
    $output='';
    $result=$this->execute_query($query);
    while($row=mysqli_fetch_object($result)) {

      $output.='
      <div class="table-row table-row__gray admin-table" name="tableRow">
        <div class="table-cell table-cell__gray" name="tableCell">
          <div name="update" class="only-icon-btn btn__blue btn__margin" type="button"><span class="material-icons">mode_edit</span></div>
          <div name="delete" class="only-icon-btn btn__red btn__margin" type="button"><span class="material-icons">delete_outline</span></div>
        </div>
        <div class="table-cell table-cell__gray" name="tableCell" value="'.$row->admin_employee.'">'.$row->admin_employee.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->admin_pw.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->admin_name.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->admin_position.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->admin_concurrent.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->admin_office.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->admin_team.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->admin_department.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->admin_department2.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->admin_level.'</div>
      </div>
      ';
    }
    return $output;
  }

  //인원 데이터 조회
  public function get_member_data_in_table($query) {
    $output='';
    $result=$this->execute_query($query);
    while($row=mysqli_fetch_object($result)) {
      $output.='
      <div class="table-row table-row__gray member-table" name="tableRow">
        <div class="table-cell table-cell__gray" name="tableCell">
          <div name="update" class="only-icon-btn btn__blue btn__margin" type="button"><span class="material-icons">mode_edit</span></div>
          <div name="delete" class="only-icon-btn btn__red btn__margin" type="button"><span class="material-icons">delete_outline</span></div>
        </div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->mem_office.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->mem_team.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->mem_department.'</div>
        <div class="table-cell table-cell__gray" name="tableCell" value="'.$row->mem_employee.'">'.$row->mem_employee.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->mem_name.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->mem_join_date.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->mem_place.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">별도 확인</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->mem_etc.'</div>
      </div>
      ';
    }
    return $output;
  }

  //좌석 데이터 조회
  public function get_seat_data_in_table($query) {
    $output='';
    $result=$this->execute_query($query);
    while($row=mysqli_fetch_object($result)) {
      $output.='
      <div class="table-row table-row__gray seat-table" name="tableRow">
        <div class="table-cell table-cell__gray" name="tableCell">
          <div name="update" class="only-icon-btn btn__blue btn__margin" type="button"><span class="material-icons">mode_edit</span></div>
          <div name="delete" class="only-icon-btn btn__red btn__margin" type="button"><span class="material-icons">delete_outline</span></div>
        </div>
        <div class="table-cell table-cell__gray" name="tableCell" value="'.$row->seat_num.'">'.$row->seat_num.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->seat_manager.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->seat_type.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->seat_ip.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->seat_name.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->seat_security.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->seat_security_info1.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->seat_security_info2.'</div>
        <div class="table-cell table-cell__gray" name="tableCell">'.$row->seat_etc.'</div>
      </div>
      ';
    }
    return $output;
  }
}
?>