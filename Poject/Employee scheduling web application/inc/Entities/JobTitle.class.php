<?php

// Tong Apr 10

class JobTitle
{

    private $JobTitleId;
    private $JobTitleName;
    private $AdminUserId;

    // set
    public function setJobTitleId(int $JobTitleId)
    {

        $this->JobTitleId = $JobTitleId;
    }
    public function setJobtitleName(string $JobTitleName)
    {
        $this->JobTitleName = $JobTitleName;
    }
    public function setAdminUserId(string $AdminUserId)
    {
        $this->AdminUserId = $AdminUserId;
    }

    // get
    public function getJobTitleId(): int
    {

        return $this->JobTitleId;
    }
    public function getJobTitleName(): string
    {
        return $this->JobTitleName;
    }
    public function getAdminUserId(): string
    {

        return $this->AdminUserId;
    }


    // to std
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
