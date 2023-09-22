<?php

class UsersTest extends \PHPUnit\Framework\TestCase{

    public function testDelete(){
        require 'admin/model/student.php';

        $Database = new Database;

        $result = $Database->delete(56);

        $this->assertEquals(1, $result);
    }

    public function testApproveStudent(){
        require 'admin/model/student.php';

        $Database = new Database;

        $result = $Database->approve(56);

        $this->assertEquals(1, $result);
    }

    public function testNumberOfRows(){
        require 'admin/model/student.php';

        $db4 = new Database;

        $result = $db4->totalRowCount();

        $this->assertEquals(2, $result);
    }
}

?>