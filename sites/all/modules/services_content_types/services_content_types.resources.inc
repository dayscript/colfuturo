<?php

/**
 * Returns the results of a node_load() for the specified node.
 *
 * This returned node may optionally take content_permissions settings into
 * account, based on a configuration setting.
 *
 * @param int $nid
 *   NID of the node we want to return.
 * @param string $content_type
 *   Machine name of content type.
 *
 * @return object|boolean
 *   Node object or FALSE if not found.
 *
 * @see node_load()
 */
function _services_content_types_retrieve($nid, $content_type) {
  if (module_exists('services_entity')) {
    $args = array('node', $nid, '*');
    $controller = _services_content_types_get_controller($content_type);

    return call_user_func_array(array($controller, 'retrieve'), $args);
  }
  else {
    return _node_resource_retrieve($nid);
  }
}

/**
 * Creates a new node based on submitted values.
 *
 * Note that this function uses drupal_form_submit() to create new nodes,
 * which may require very specific formatting. The full implications of this
 * are beyond the scope of this comment block. The Googles are your friend.
 *
 * @param array $node
 *   Array representing the attributes a node edit form would submit.
 * @param string $content_type
 *   Machine name of content type.
 *
 * @return array
 *   An associative array contained the new node's nid and, if applicable,
 *   the fully qualified URI to this resource.
 *
 * @see drupal_form_submit()
 */
function _services_content_types_create($node, $content_type) {
  $node['type'] = $content_type;

  if (module_exists('services_entity')) {
    $args = array('node', $node);
    $controller = _services_content_types_get_controller($content_type);

    return call_user_func_array(array($controller, 'create'), $args);
  }
  else {
    $node = _node_resource_create($node);
    $node['uri'] = str_replace('/node/', "/node_$content_type/", $node['uri']);

    return $node;
  }
}

/**
 * Updates a new node based on submitted values.
 *
 * Note that this function uses drupal_form_submit() to create new nodes,
 * which may require very specific formatting. The full implications of this
 * are beyond the scope of this comment block. The Googles are your friend.
 *
 * @param int $nid
 *   Node ID of the node we're editing.
 * @param array $node
 *   Array representing the attributes a node edit form would submit.
 * @param string $content_type
 *   Machine name of content type.
 *
 * @return int
 *   The node's nid.
 *
 * @see drupal_form_submit()
 */
function _services_content_types_update($nid, $node, $content_type) {
  $node['type'] = $content_type;

  if (module_exists('services_entity')) {
    $args = array('node', $nid, $node);
    $controller = _services_content_types_get_controller($content_type);

    return call_user_func_array(array($controller, 'update'), $args);
  }
  else {
    $node = _node_resource_update($nid, $node);
    $node['uri'] = str_replace('/node/', "/node_$content_type/", $node['uri']);

    return $node;
  }
}

/**
 * Delete a node given its nid.
 *
 * @param int $nid
 *   Node ID of the node we're deleting.
 * @param string $content_type
 *   Machine name of content type.
 *
 * @return bool
 *   Returns true if deleted.
 */
function _services_content_types_delete($nid, $content_type) {
  if (module_exists('services_entity')) {
    $args = array('node', $nid);
    $controller = _services_content_types_get_controller($content_type);

    return call_user_func_array(array($controller, 'delete'), $args);
  }
  else {
    return _node_resource_delete($nid);
  }
}


/**
 * Return an array of optionally paged nids based on a set of criteria.
 *
 * An example request might look like
 *
 * http://domain/endpoint/node?fields=nid,vid&parameters[nid]=7&parameters[uid]=1
 *
 * This would return an array of objects with only nid and vid defined, where
 * nid = 7 and uid = 1.
 *
 * @param int $page
 *   Page number of results to return (in pages of 20).
 * @param array $fields
 *   The fields you want returned.
 * @param array $parameters
 *   An array containing fields and values used to build a sql WHERE clause
 *   indicating items to retrieve.
 * @param int $page_size
 *   Integer number of items to be returned.
 * @param array $options
 *   Additional query options.
 * @param string $content_type
 *   Machine name of content type.
 *
 * @return array
 *   An array of node objects.
 */
function _services_content_types_index($page, $fields, $parameters, $page_size, $options = array(), $content_type) {
  $parameters['type'] = $content_type;

  if (module_exists('services_entity')) {
    $args = array('node', $fields, $parameters, $page, $page_size);
    $controller = _services_content_types_get_controller($content_type);
    return call_user_func_array(array($controller, 'index'), $args);
  }
  else {
    return _node_resource_index($page, $fields, $parameters, $page_size, $options);
  }
}

/**
 * Returns the comments of a specified node.
 *
 * @param $nid
 *   Unique identifier for the node.
 * @param $count
 *   Number of comments to return.
 * @param $start
 *   Which comment to start with. If present, $start and $count are used together
 *   to create a LIMIT clause for selecting comments. This could be used to do paging.
 * @param string $content_type
 *   Machine name of content type.
 *
 * @return array
 *   An array of comment objects.
 */
function _services_content_types_load_node_comments($nid, $count = 0, $start = 0, $content_type) {
  $node = node_load($nid);

  if (isset($node) && $node->type == $content_type) {
    return _node_resource_load_node_comments($nid, $count, $start);
  }

  return array();
}
