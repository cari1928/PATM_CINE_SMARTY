<?php

class Notification extends Cine
{

  /**
   * Send firebase notification
   * @param  [type] $tokens       [description]
   * @param  [type] $notification [description]
   * @param  [type] $message      [description]
   * @return [type]               [description]
   */
  public function send_notification($tokens, $notification, $message)
  {
    $url    = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
      'registration_ids' => $tokens,
      'notification'     => $notification,
      'data'             => $message,
    );

    $headers = array(
      'Authorization:key=AIzaSyADuWmF63qrYWzEtfe4qQREBunMT-_3jb4',
      'Content-Type:application/json',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch);

    if ($result === false) {
      die('Curl failed: ' . curl_error($ch));
    }

    curl_close($ch);

    return $result;
  }

}
