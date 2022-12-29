<?php

	/**
	 * This class use to send SMS via the Nexah API
	 */
	class NexahSMS
	{
		protected $user;
		protected $password;
		protected $senderid;
		protected $sms;
		protected $mobiles;
		protected $success_message = "1";
		protected $success_res     = false;

		/**
		 * This methods is used to send and sms to one or more numbers
		 *
		 * @param $user
		 * @param $password
		 * @param $senderid
		 * @param $sms
		 * @param $mobiles
		 * @return bool
		 */
		public function send_sms($user, $password, $senderid, $sms, $mobiles)
		{
			//  data to be sent to the API
			$data = array("user" => $user, "password" => $password, "senderid" => $senderid, "sms"
			                     => $sms, "mobiles" => $mobiles);

			//  encode the data
			$data = json_encode($data);

			//  create curl resource
			$ch = curl_init();

			//  set the curl option to send to the API
			curl_setopt_array($ch, array(
				//  connection with the api
				CURLOPT_URL            => "https://smsvas.com/bulk/public/index.php/api/v1/sendsms",
				//  response of the server
				CURLOPT_RETURNTRANSFER => true,
				//  the HTTP method to use
				CURLOPT_CUSTOMREQUEST  => "POST",
				//  set the header options
				CURLOPT_HTTPHEADER     => array(
					"Content-type: application/json",
					"Accept: application/json"
				),
				//  set body params
				CURLOPT_POSTFIELDS     => $data,
			));

			//  getting the response from the execution of the post command
			//  with the credentials we sent
			$res = curl_exec($ch);

			//  close the curl execution
			curl_close($ch);

			//  check if the sms has been sent
			//  if so
			//      set the success response to true
			if (strpos($res, $this->success_message)) {
				$this->setSuccessRes(true);
			}

			//  return the response according to the success response
			return $this->isSuccessRes();
		}

		/**
		 * @return bool
		 */
		public function isSuccessRes()
		{
			return $this->success_res;
		}

		/**
		 * @param bool $success_res
		 */
		public function setSuccessRes($success_res)
		{
			$this->success_res = $success_res;
		}

		/**
		 * @return string
		 */
		public function getSuccessMessage()
		{
			return $this->success_message;
		}

		/**
		 * @param string $success_message
		 */
		public function setSuccessMessage($success_message)
		{
			$this->success_message = $success_message;
		}

		/**
		 * @return mixed
		 */
		public function getUser()
		{
			return $this->user;
		}

		/**
		 * @param mixed $user
		 */
		public function setUser($user)
		{
			$this->user = $user;
		}

		/**
		 * @return mixed
		 */
		public function getPassword()
		{
			return $this->password;
		}

		/**
		 * @param mixed $password
		 */
		public function setPassword($password)
		{
			$this->password = $password;
		}

		/**
		 * @return mixed
		 */
		public function getSenderid()
		{
			return $this->senderid;
		}

		/**
		 * @param mixed $senderid
		 */
		public function setSenderid($senderid)
		{
			$this->senderid = $senderid;
		}

		/**
		 * @return mixed
		 */
		public function getSms()
		{
			return $this->sms;
		}

		/**
		 * @param mixed $sms
		 */
		public function setSms($sms)
		{
			$this->sms = $sms;
		}

		/**
		 * @return mixed
		 */
		public function getMobiles()
		{
			return $this->mobiles;
		}

		/**
		 * @param mixed $mobiles
		 */
		public function setMobiles($mobiles)
		{
			$this->mobiles = $mobiles;
		}
	}