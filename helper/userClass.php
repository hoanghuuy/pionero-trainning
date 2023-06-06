<?php

class User {
  // Properties
  public $id;
  public $name;
  public $email;
  public $phoneNumber;

  // Constructor
  function __construct($id, $name, $email, $phoneNumber) {
    $this->id = $id; 
    $this->name = $name; 
    $this->email = $email; 
    $this->phoneNumber = $phoneNumber; 
  }

  // Methods
  // set
  function set_id($id) {
    $this->id = $id;
  }
  function set_name($name) {
    $this->name = $name;
  }
  function set_email($email) {
    $this->email = $email;
  }
  function set_phoneNumber($phoneNumber) {
    $this->phoneNumber = $phoneNumber;
  }

  // get
  function get_id() {
    return $this->id;
  }
  function get_name() {
    return $this->name;
  }
  function get_email() {
    return $this->email;
  }
  function get_phoneNumber() {
    return $this->phoneNumber;
  }
}