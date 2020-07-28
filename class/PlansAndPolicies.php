<?php
final class PlansAndPolicies extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table('plansandpolicies');
    }

    public function getByID($Id)
	{
		$args=array(
			'where'=>array(
				'Id'=>$Id
			),
			'order_by'=>'Id ASC'
		);
		return $this->select($args);
	}

    public function deleteById($Id)
    {
        $args = array( 
            'where' => array(
                'Id' => $Id
            )
        );
        return $this->delete($args);
    }


    public function updatePlanPolicies($data, $PlanpolicyId)
    {
        $args = array(
            'where' => array(
                'Id' => $PlanpolicyId
            )
        );
        $success = $this->update($data, $args);
        if ($success) {
            return $PlanpolicyId;
        } else {
            return false;
        }
    }

    public function addPlansAndPolicies($data)
    {
        return $this->insert($data);
    }

    public function getAllPlans()
    {
        $args = array(
            'where' => array(
                'Type' => 'Plan'
            ),
            'order_by' => 'Id DESC'
        );
        return $this->select($args);
    }
    public function getAllPolicies()
    {
        $args = array(
            'where' => array(
                'Type' => 'Policy'
            ),
            'order_by' => 'Id DESC'
        );
        return $this->select($args);
    }

    public function getAll()
    {
        $args = array(
            'order_by' => 'Id DESC'
        );
        return $this->select($args);
    }
}
