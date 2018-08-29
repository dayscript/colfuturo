<?php
/**
 * @file
 * Template to display a column
 * 
 * - $item: The item to render within a td element.
 */
$id = (isset($item['id'])) ? 'id="' . $item['id'] . '" ' : '';
$date = (isset($item['date'])) ? ' data-date="' . $item['date'] . '" ' : '';
$day = (isset($item['day_of_month'])) ? ' data-day-of-month="' . $item['day_of_month'] . '" ' : '';
$headers = (isset($item['header_id'])) ? ' headers="'. $item['header_id'] .'" ' : '';
if( isset($item['header_id']) ){
    $date_array = explode('-', $item['date']);
    $date_week =  date("D", mktime(0, 0, 0, $date_array[1], $date_array[2], $date_array[0]));
}
?>
<td <?php print $id?>class="<?php echo (isset($date_week)) ? $date_week.' ' : '' ?><?php print $item['class'] ?>" colspan="<?php print $item['colspan'] ?>" rowspan="<?php print $item['rowspan'] ?>"<?php print $date . $headers . $day; ?>>
  <div class="inner">
    <?php print $item['entry'] ?>
  </div>
</td>
