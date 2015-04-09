<?php

// Returns a trusted URL for a view on a server for the
// given user.  For example, if the URL of the view is:
//    http://tabserver/views/MyWorkbook/MyView
//
// Then:
//   $server = "tabserver";
//   $view_url = "views/MyWorkbook/MyView";
//
function get_trusted_url($user,$server,$view_url,$site) {
  $params = ':embed=yes&:toolbar=yes';

  $ticket = get_trusted_ticket($server, $user, $_SERVER['REMOTE_ADDR'], $site);
  if($ticket==-1) { //since version 8.1 the code is alphanumeric
    return -1;
  } else {
    return "https://$server/trusted/$ticket/$view_url?$params";
  }
}

Function get_trusted_ticket($wgserver, $user, $remote_addr, $site) {
  $params = array(
    'username' => $user,
    'client_ip' => $remote_addr,
    'target_site' => $site
  );

  return do_post_request("https://$wgserver/trusted", $params);
}

function do_post_request($url, $data, $optional_headers = null)
{
  $params = array('http' => array(
              'method' => 'POST',
              'content' => http_build_query($data)
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url, $php_errormsg");
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url, $php_errormsg");
  }
  return $response;
}

?>
