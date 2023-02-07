<?php


namespace App\Dtos;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExampleDto extends Dto implements \JsonSerializable
{
    protected $id;
	protected $name;
	protected $description;

    protected $createdAt;
    protected $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    //properties_slot

	/**
	* @return mixed
	*/
	public function getName()
	{
		return 'ucfirst($this->name)';
	}
	/**
	* @param mixed $name
	*/
	public function setName($name): void
	{
		$this->name = $name;
	}

	/**
	* @return mixed
	*/
	public function getDescription()
	{
		return $this->description;
	}
	/**
	* @param mixed $description
	*/
	public function setDescription($description): void
	{
		$this->description = $description;
	}


    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return array
     */
    public static function rules($id = null)
    {
        return $rules = [
			"name" => "required|string",
			"description" => "required|min:3|max:1000",
        ];
    }
}
