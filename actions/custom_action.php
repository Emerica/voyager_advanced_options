<?php
#This will let you add custom action buttons
#service provider, Voyager::addAction(WorkerJobActions::class);

namespace App\Actions;
use TCG\Voyager\Actions\AbstractAction;

class CustomAction extends AbstractAction
{
  #NOTE# - This get policy is needed for the custom button to appear.
  #It's not noted in the documentation, I'm still learning the purpose of policies.
  #It maybe fixed in later versions of voyager, who knows...
  #The view output for the button does a @can($action->getPolicy(), $data) check.
  #for this to work for me I had policy set to "read", unsure if correct, but works.

  public function getPolicy()
  {
      return 'some_policy';   //read
  }

  #This is the dabase table
  public function getDataType()
  {
      return 'some_table';
  }

  #This is the text that will appear in the button
  public function getTitle()
  {
      return 'test '.$this->data->{$this->data->getKeyName()};
  }

  #This is the icon that will appear in the button
  public function getIcon()
  {
      return 'voyager-list';
  }

  #This is the route to take.
  public function getDefaultRoute()
  {
      return 'test';
  }

  #This is the href attributes
  #NOTE# - The stock voyager View button's css class doesn't leave any right
  #padding between the buttons, I modified the stock view button to use the edit
  #buttons css class.
  public function getAttributes()
  {
      return [
          'class'   => 'btn btn-sm btn-danger pull-right edit',
          'data-id' => $this->data->{$this->data->getKeyName()},
          'id'      => 'test-'.$this->data->{$this->data->getKeyName()},
      ];
  }
}
