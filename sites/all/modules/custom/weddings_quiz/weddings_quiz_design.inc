<?php

/**
 * @file
 * This is the Form API design from the handbook.
 *
 * It goes through several form examples of increasing complexity to demonstrate
 * Drupal 7 Form API.
 *
 * Links are provided inline for the related handbook pages.
 *
 * @see http://drupal.org/node/262422
 */

/**
 * Main Form design page.
 *
 * @see weddings_quiz_design_1()
 *
 * @ingroup weddings_quiz
 */

function theme_weddings_quiz_image_upd($variables) {

  $element = $variables['element'];
  $output = '';
  if ($element['fid']['#value'] != 0) {
    // if image is uploaded show its thumbnail to the output HTML
    $output .= '<div class="image-preview">';
    $output .= theme('image_style', array('style_name' => 'medium', 'path' => file_load($element['fid']['#value'])->uri, 'getsize' => TRUE));
    $output .= drupal_render_children($element);
    $output .= '</div>';
  }
  return $output;
}

/**
 * Funcion encargada de guardar una imagen cargada en el formulario
 *
 * @param $form_state_image
 * @param $id
 * @param $type
 */
function _weddings_quiz_almacenar_imagenes($form_state_image, $id, $type)
{
  $file_quiz = file_load($form_state_image);
  $file_quiz->status = FILE_STATUS_PERMANENT;
  file_save($file_quiz);
  file_usage_add($file_quiz, 'weddings_quiz', $type, $id);
}

/**
 * Funcione encargada de remover una imagen cargada
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $id_img
 * @param $id
 * @param $type
 */
function _weddings_quiz_remover_imagenes($id_img, $id, $type)
{
  $file_img_quiz_ini = file_load($id_img);
  $file_img_quiz_ini->status = 0;
  file_save($file_img_quiz_ini);
  file_usage_delete($file_img_quiz_ini, 'weddings_quiz', $type, $id);
}

/**
 * Funcion encargada de llevar a cabo el guardado de un quiz
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $form_state
 *
 * @return bool|\DatabaseStatementInterface|int
 */
function _weddings_quiz_guardar_quiz($form_state)
{
  try
  {
    $fields = array(
      'language' => $form_state['values']['language'],
      'nombre_quiz' => $form_state['values']['name'],
      'descripcion' => check_markup($form_state['values']['descripcion']['value'], $form_state['values']['descripcion']['format']),
      'id_img_quiz' => $form_state['values']['img_home'],
      'id_img_banner_preg' => $form_state['values']['img_detalle'],
      'id_img_banner_mobile_preg' => $form_state['values']['img_detalle_mobile'],
    );
    $id_quiz = db_insert('quiz')
      ->fields($fields)
      ->execute();

    return $id_quiz;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error almacenando el nuevo quiz : '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de llevar a cabo el actualizado de un quiz
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $form_state
 *
 * @return bool|\DatabaseStatementInterface
 */
function _weddings_quiz_actualizar_quiz($form_state)
{
  try
  {
    $update = db_update('quiz')
      ->fields(array(
        'language' => $form_state['values']['language'],
        'nombre_quiz' => $form_state['values']['name'],
        'descripcion' => check_markup($form_state['values']['descripcion']['value'], $form_state['values']['descripcion']['format']),
        'id_img_quiz' => $form_state['values']['img_home'],
        'id_img_banner_preg' => $form_state['values']['img_detalle'],
        'id_img_banner_mobile_preg' => $form_state['values']['img_detalle_mobile'],
      ))
      ->condition('id_quiz', $form_state['values']['id_quiz'], '=')
      ->execute();

    return $update;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error actualizando el quiz '.$form_state['values']['id_quiz'].' Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de llevar a cabo el guardado de las respuestas
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $form_state
 * @param $id_quiz
 * @param $number
 *
 * @return bool|\DatabaseStatementInterface|int
 */
function _weddings_quiz_guardar_respuestas($form_state, $id_quiz, $number)
{
  try
  {
    $fields = [
      'titulo' => $form_state['values']['name_answer' . $number],
      'subtitulo' => $form_state['values']['subtitle_answer' . $number],
      'descripcion' => check_markup($form_state['values']['descripcion_answer' . $number]['value'], $form_state['values']['descripcion_answer' . $number]['format']),
      'id_img_banner_respuesta' => $form_state['values']['img_title_answer' . $number],
      'id_img_banner_mobile_respuesta' => $form_state['values']['img_title_answer_mobile' . $number],
      'id_img_pregunta' => $form_state['values']['img_answer' . $number],
      'id_img_galeria_1' => $form_state['values']['img_galeria1' . $number],
      'id_img_galeria_2' => $form_state['values']['img_galeria2' . $number],
      'id_img_galeria_3' => $form_state['values']['img_galeria3' . $number],
      'title_link' => $form_state['values']['title_link' . $number],
      'link' => $form_state['values']['link' . $number],
      'id_quiz' => $id_quiz,
    ];
    $id_respuesta = db_insert('quiz_respuesta')
      ->fields($fields)
      ->execute();

    return $id_respuesta;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error almacenando la respuesta '.$number.' para el quiz '.$id_quiz.'. Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de llevar a cabo el actualizado de las respuestas
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $form_state
 * @param $i
 *
 * @return bool|\DatabaseStatementInterface
 */
function _weddings_quiz_actualizar_respuestas($form_state, $i)
{
  try
  {
    $update = db_update('quiz_respuesta')
      ->fields(array(
        'titulo' => $form_state['values']['name_answer'.$i],
        'subtitulo' => $form_state['values']['subtitle_answer'.$i],
        'descripcion' => check_markup($form_state['values']['descripcion_answer'.$i]['value'], $form_state['values']['descripcion_answer'.$i]['format']),
        'id_img_banner_respuesta' => $form_state['values']['img_title_answer'.$i],
        'id_img_banner_mobile_respuesta' => $form_state['values']['img_title_answer_mobile'.$i],
        'id_img_pregunta' => $form_state['values']['img_answer'.$i],
        'id_img_galeria_1' => $form_state['values']['img_galeria1'.$i],
        'id_img_galeria_2' => $form_state['values']['img_galeria2'.$i],
        'id_img_galeria_3' => $form_state['values']['img_galeria3'.$i],
        'title_link' => $form_state['values']['title_link'.$i],
        'link' => $form_state['values']['link'.$i],
        'id_quiz' => $form_state['values']['id_quiz'],
      ))
      ->condition('id_respuesta', $form_state['values']['id_answer'.$i], '=')
      ->execute();

    return $update;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error actualizando la respuesta '.$form_state['values']['id_answer'.$i].' Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de eliminar una respuesta por el identificador
 *
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $id_respuesta
 *
 * @return bool|\DatabaseStatementInterface
 */
function _weddings_quiz_eliminar_respuestas($id_respuesta)
{
  try
  {
    $num_deleted = db_delete('quiz_respuesta')
      ->condition('id_respuesta', $id_respuesta)
      ->execute();

    return $num_deleted;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error eliminando la respuesta con id '.$id_respuesta.' Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de llevar a cabo el guardado de las preguntas
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $form_state
 * @param $id_quiz
 * @param $number
 *
 * @return bool|\DatabaseStatementInterface|int
 */
function _weddings_quiz_guardar_pregunta($form_state, $id_quiz, $number)
{
  try
  {
    $fields = [
      'pregunta' => $form_state['values']['name_question' . $number],
      'id_quiz' => $id_quiz,
    ];
    $id_pregunta = db_insert('quiz_pregunta')
      ->fields($fields)
      ->execute();

    return $id_pregunta;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error almacenando la pregunta '.$number.' para el quiz '.$id_quiz.'. Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de llevar a cabo el actualizado de las preguntas
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $form_state
 * @param $i
 *
 * @return bool|\DatabaseStatementInterface
 */
function _weddings_quiz_actualizar_preguntas($form_state, $i)
{
  try
  {
    $update = db_update('quiz_pregunta')
      ->fields(array(
        'pregunta' => $form_state['values']['name_question'.$i],
        'id_quiz' => $form_state['values']['id_quiz'],
      ))
      ->condition('id_pregunta', $form_state['values']['id_question'.$i], '=')
      ->execute();

    return $update;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error actualizando la pregunta '.$form_state['values']['id_question'.$i].' Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de eliminar una pregunta por el identificador *
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $id_respuesta
 *
 * @return bool|\DatabaseStatementInterface
 */
function _weddings_quiz_eliminar_pregunta($id_pregunta)
{
  try
  {
    $num_deleted = db_delete('quiz_pregunta')
      ->condition('id_pregunta', $id_pregunta)
      ->execute();

    return $num_deleted;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error eliminando la pregunta con id '.$id_pregunta.' Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de llevar a cabo el guardado de las opciones de preguntas
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $form_state
 * @param $id_pregunta
 * @param $id_respuesta
 * @param $numberI
 * @param $numberJ
 *
 * @return bool|\DatabaseStatementInterface|int
 */
function _weddings_quiz_guardar_opciones($form_state, $id_pregunta, $id_respuesta, $numberI, $numberJ)
{
  try
  {
    $fields = [
      'titulo' => $form_state['values']['name_option' . $numberI . $numberJ],
      'id_img_opcion' => $form_state['values']['img_option' . $numberI . $numberJ],
      'id_pregunta' => $id_pregunta,
      'id_respuesta' => $id_respuesta,
    ];
    $id_op = db_insert('quiz_opcion')
      ->fields($fields)
      ->execute();

    return $id_op;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error almacenando la opcion '.$numberI.' x '.$numberJ.' para la pregunta '.$id_pregunta.'. Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de llevar a cabo el actualizado de una opcion
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $form_state
 *
 * @return bool|\DatabaseStatementInterface
 */
function _weddings_quiz_actualizar_opcion($form_state, $i, $j)
{
  try
  {
    $update = db_update('quiz_opcion')
      ->fields(array(
        'titulo' => $form_state['values']['name_option'.$i.$j],
        'id_img_opcion' => $form_state['values']['img_option'.$i.$j],
      ))
      ->condition('id_opcion', $form_state['values']['id_option'.$i.$j], '=')
      ->execute();

    return $update;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error actualizando la opcion '.$form_state['values']['id_option'.$i.$j].' Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de consultar un quiz por su llave primaria
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param Integer $id_quiz: Identificador del quiz para consultar
 *
 * @return array|null
 */
function _weddings_quiz_get_quiz_id($id_quiz)
{
  $query = db_select('quiz', 'q')
            ->fields('q')
            ->condition('id_quiz', $id_quiz)
            ->execute();

  $numquiz = 0;
  $data_quiz = NULL;
  while($record = $query->fetchAssoc()) {
    $data_quiz[$numquiz] = $record;
    $numquiz++;
  }

  return $data_quiz;
}

/**
 * Funcion encargada de consultar las respuestas configuradas en un quiz
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param Integer $id_quiz:     Identificador del quiz para consultar *
 * @param Integer $num_answer:  Número de respuestas a configurar
 *
 * @return array|null
 */
function _weddings_quiz_get_respuestas_by_quiz($id_quiz, &$num_answer)
{
  $query = db_select('quiz_respuesta', 'r')
    ->fields('r')
    ->condition('id_quiz', $id_quiz)
    ->execute();

  $data_respuesta = NULL;
  while($record = $query->fetchAssoc())
  {
    $data_respuesta[$num_answer] = $record;
    $num_answer++;
  }

  return $data_respuesta;
}

/**
 * Funcion encargada de consultar las preguntas y las opciones de un quiz especifico
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param Integer $id_quiz:       Identificador del quiz para consultar
 * @param Integer $num_question:  Número de preguntas a configurar
 *
 * @return array|null
 */
function _weddings_quiz_get_preguntas_by_quiz($id_quiz, &$num_question, $order = FALSE)
{
  $query = db_select('quiz_pregunta', 'p')
    ->fields('p')
    ->condition('id_quiz', $id_quiz);
  if ($order)
  {
    $query->orderBy('id_pregunta', 'ASC');
  }
  $query = $query->execute();

  $data_pregunta = NULL;
  while($record = $query->fetchAssoc())
  {
    $data_pregunta[$num_question] = $record;

    $queryOp = db_select('quiz_opcion', 'o')
      ->fields('o')
      ->condition('id_pregunta', $data_pregunta[$num_question]['id_pregunta'])
      ->execute();

    $numopciones = 0;
    while($record1 = $queryOp->fetchAssoc())
    {
      $data_pregunta[$num_question]['opt'][$numopciones] = $record1;
      $numopciones++;
    }
    $num_question++;
  }

  return $data_pregunta;
}

/**
 * Funcion encargada de consultar las opciones por respuesta
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $id_respuesta
 * @param $delopciones
 *
 * @return null
 */
function _weddings_quiz_get_opciones_by_respuesta($id_respuesta, &$delopciones)
{
  $query = db_select('quiz_opcion', 'o')
    ->fields('o')
    ->condition('id_respuesta', $id_respuesta)
    ->execute();

  $del_opciones = NULL;
  while ($record1 = $query->fetchAssoc()) {
    $del_opciones[$delopciones] = $record1;
    $delopciones++;
  }

  return $del_opciones;
}

/**
 * Funcion encargada de consultar las opciones por pregunta
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $id_respuesta
 * @param $delopciones
 *
 * @return null
 */
function _weddings_quiz_get_opciones_by_pregunta($id_pregunta, &$numopciones, $order = FALSE)
{
  $query = db_select('quiz_opcion', 'o')
    ->fields('o')
    ->condition('id_pregunta', $id_pregunta);

  if ($order)
  {
    $query->orderBy('RAND()');
  }
  $query = $query->execute();

  $del_opciones = NULL;
  while($record1 = $query->fetchAssoc()) {
    $del_opciones[$numopciones] = $record1;
    $numopciones++;
  }
  return $del_opciones;
}

/**
 * Funcion encargada de una opcion por el id
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $id_opcion
 *
 * @return bool|\DatabaseStatementInterface
 */
function _weddings_quiz_eliminar_opcion($id_opcion)
{
  try
  {
    $num_deleted = db_delete('quiz_opcion')
      ->condition('id_opcion', $id_opcion)
      ->execute();

    return $num_deleted;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error eliminando la opcion con id '.$id_opcion.' Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Example 5: Basic form with additional element attributes.
 *
 * This demonstrates additional attributes of text form fields.
 *
 * See the
 * @link http://api.drupal.org/api/file/developer/topics/forms_api.html complete form reference @endlink
 *
 * @ingroup weddings_quiz
 */

function weddings_quiz_reg($form, &$form_state, $id_quiz)
{
  $data_quiz = $data_respuesta = NULL;
  if($id_quiz != 0)
  {
    $data_quiz = _weddings_quiz_get_quiz_id($id_quiz);
  }

  $form['id_quiz'] = array(
    '#type' => 'hidden',
    '#value' => $id_quiz,
  );

  $form['description'] = array(
    '#type' => 'item',
    '#title' => t('Quiz Overview'),
    '#description' => t('Configure the general quiz data'),
  );

  $form['quiz'] = array(
    '#type' => 'fieldset',
    '#title' => t('General Information quiz'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );

  $form['quiz']['language'] = array(
    '#title' => t('Language'),
    '#type' => 'select',
    '#required' => TRUE,
    '#description' => t('Select the language.'),
    '#options' => locale_language_list('name'),
    '#default_value' => isset($data_quiz[0]['language']) ? $data_quiz[0]['language'] : '',
  );

  $form['quiz']['img_home'] = array(
    '#type' => 'managed_file',
    '#title' => t('Image start quiz'),
    '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 742 x 612 pixel'),
    '#required' => TRUE,
    '#upload_location' => 'public://quiz/home/',
    '#default_value' => isset($data_quiz[0]['id_img_quiz']) ? $data_quiz[0]['id_img_quiz'] : '',
    '#theme' => 'weddings_quiz_image_upd',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );

  $form['quiz']['img_detalle'] = array(
    '#type' => 'managed_file',
    '#title' => t('Quiz detail banner'),
    '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 1920 x 600 pixel'),
    '#required' => TRUE,
    '#upload_location' => 'public://quiz/fondo_general/',
    '#default_value' => isset($data_quiz[0]['id_img_banner_preg']) ? $data_quiz[0]['id_img_banner_preg'] : '',
    '#theme' => 'weddings_quiz_image_upd',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );

  $form['quiz']['img_detalle_mobile'] = array(
    '#type' => 'managed_file',
    '#title' => t('Quiz detail banner mobile'),
    '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 320 x 494 pixel'),
    '#required' => TRUE,
    '#upload_location' => 'public://quiz/fondo_general/',
    '#default_value' => isset($data_quiz[0]['id_img_banner_mobile_preg']) ? $data_quiz[0]['id_img_banner_mobile_preg'] : '',
    '#theme' => 'weddings_quiz_image_upd',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );

  $form['quiz']['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#required' => TRUE,
    '#description' => "Title Quiz",
    '#default_value' => isset($data_quiz[0]['nombre_quiz']) ? $data_quiz[0]['nombre_quiz'] : '',
    '#size' => 100,
    '#maxlength' => 100,
  );

  $form['quiz']['descripcion'] = array(
    '#type' => 'text_format',
    '#rows' => 4,
    '#title' => t('Description'),
    '#format' => 'full_html',
    '#description' => "Description of the quiz detail",
    '#default_value' => isset($data_quiz[0]['descripcion']) ? $data_quiz[0]['descripcion'] : '',
    '#required' => TRUE,
  );

  $num_answer = 0;
  if($id_quiz != 0 && isset($data_quiz))
  {
    $data_respuesta = _weddings_quiz_get_respuestas_by_quiz($id_quiz, $num_answer);
  }
  else
  {
    $num_answer = 4;
    $num_opciones = 4;
  }

  $form['descrip_answer'] = array(
    '#markup' => '<div>' . t('The number of final results is between 3 and 6, the number of results is related to the number of options of each question')
      . '</div>',
  );

  $form['answer_fieldset'] = array(
    '#type' => 'fieldset',
    '#title' => t('Final results'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#prefix' => '<div id="answer-fieldset-wrapper">',
    '#suffix' => '</div>'
  );

  if (empty($form_state['num_answer']))
  {
    $num_opciones = $form_state['num_answer'] = $num_answer;
  }
  else
  {
    $num_opciones = $form_state['num_answer'];
  }

  $form['number_answer'] = array(
    '#type' => 'hidden',
    '#value' => $num_opciones,
  );

  $numR = 0;
  for ($i = 1; $i <= $form_state['num_answer']; $i++)
  {
    $form['answer_fieldset'][$i] = array(
      '#type' => 'fieldset',
      '#title' => t('Result ').$i,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE
    );
    if($id_quiz != 0 && isset($data_quiz))
    {
      $form['answer_fieldset'][$i]['id_answer'.$i] = array(
        '#type' => 'hidden',
        '#value' => isset($data_respuesta[$numR]['id_respuesta']) ? $data_respuesta[$numR]['id_respuesta'] : '',
      );
    }
    $form['answer_fieldset'][$i]['name_answer'.$i] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t("Title $i"),
      '#default_value' => isset($data_respuesta[$numR]['titulo']) ? $data_respuesta[$numR]['titulo'] : ''
    );

    $form['answer_fieldset'][$i]['subtitle_answer'.$i] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t("Sub-Title $i"),
      '#default_value' => isset($data_respuesta[$numR]['subtitulo']) ? $data_respuesta[$numR]['subtitulo'] : ''
    );

    $form['answer_fieldset'][$i]['descripcion_answer'.$i] = array(
      '#type' => 'text_format',
      '#rows' => 4,
      '#title' => t('Description'),
      '#format' => 'full_html',
      '#description' => "Descripcion de cada respuesta",
      '#default_value' => isset($data_respuesta[$numR]['descripcion']) ? $data_respuesta[$numR]['descripcion'] : '',
      '#required' => TRUE,
    );

    $form['answer_fieldset'][$i]['img_title_answer'.$i] = array(
      '#type' => 'managed_file',
      '#title' => t('Banner response'),
      '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 1920 x 600 pixel'),
      '#required' => TRUE,
      '#upload_location' => 'public://quiz/resultado/titulo/',
      '#default_value' => isset($data_respuesta[$numR]['id_img_banner_respuesta']) ? $data_respuesta[$numR]['id_img_banner_respuesta'] : '',
      '#theme' => 'weddings_quiz_image_upd',
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
      )
    );

    $form['answer_fieldset'][$i]['img_title_answer_mobile'.$i] = array(
      '#type' => 'managed_file',
      '#title' => t('Banner mobile response'),
      '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 320 x 494 pixel'),
      '#required' => TRUE,
      '#upload_location' => 'public://quiz/resultado/titulo/',
      '#default_value' => isset($data_respuesta[$numR]['id_img_banner_mobile_respuesta']) ? $data_respuesta[$numR]['id_img_banner_mobile_respuesta'] : '',
      '#theme' => 'weddings_quiz_image_upd',
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
      )
    );

    $form['answer_fieldset'][$i]['img_answer'.$i] = array(
      '#type' => 'managed_file',
      '#title' => t('Image of the answer'),
      '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 632 x 602 pixel'),
      '#required' => TRUE,
      '#upload_location' => 'public://quiz/resultado/fondo/',
      '#default_value' => isset($data_respuesta[$numR]['id_img_pregunta']) ? $data_respuesta[$numR]['id_img_pregunta'] : '',
      '#theme' => 'weddings_quiz_image_upd',
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
      )
    );

    $form['answer_fieldset'][$i]['img_galeria1'.$i] = array(
      '#type' => 'managed_file',
      '#title' => t('Image of the galery 1'),
      '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 424 x 374 pixel'),
      '#required' => TRUE,
      '#upload_location' => 'public://quiz/resultado/fondo/',
      '#default_value' => isset($data_respuesta[$numR]['id_img_galeria_1']) ? $data_respuesta[$numR]['id_img_galeria_1'] : '',
      '#theme' => 'weddings_quiz_image_upd',
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
      )
    );

    $form['answer_fieldset'][$i]['img_galeria2'.$i] = array(
      '#type' => 'managed_file',
      '#title' => t('Image of the galery 2'),
      '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 424 x 374 pixel'),
      '#required' => TRUE,
      '#upload_location' => 'public://quiz/resultado/fondo/',
      '#default_value' => isset($data_respuesta[$numR]['id_img_galeria_2']) ? $data_respuesta[$numR]['id_img_galeria_2'] : '',
      '#theme' => 'weddings_quiz_image_upd',
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
      )
    );

    $form['answer_fieldset'][$i]['img_galeria3'.$i] = array(
      '#type' => 'managed_file',
      '#title' => t('Image of the galery 3'),
      '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 424 x 374 pixel'),
      '#required' => TRUE,
      '#upload_location' => 'public://quiz/resultado/fondo/',
      '#default_value' => isset($data_respuesta[$numR]['id_img_galeria_3']) ? $data_respuesta[$numR]['id_img_galeria_3'] : '',
      '#theme' => 'weddings_quiz_image_upd',
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
      )
    );

    $form['answer_fieldset'][$i]['title_link'.$i] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t("Title Link $i"),
      '#default_value' => isset($data_respuesta[$numR]['title_link']) ? $data_respuesta[$numR]['title_link'] : ''
    );

    $form['answer_fieldset'][$i]['link'.$i] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t("Link $i"),
      '#default_value' => isset($data_respuesta[$numR]['link']) ? $data_respuesta[$numR]['link'] : ''
    );

    $numR++;
  }

  if ($form_state['num_answer'] < 6) {
    $form['answer_fieldset']['add_answer'] = array(
      '#type' => 'submit',
      '#value' => t('Add Result'),
      '#limit_validation_errors' => array (),
      '#submit' => array('ajax_example_add_answer_more_add_one'),
      '#ajax' => array(
        'callback' => 'ajax_example_add_answer_more_callback',
        'wrapper' => 'answer-fieldset-wrapper',
      ),
    );
  }
  if ($form_state['num_answer'] > 3) {
    $form['answer_fieldset']['remove_answer'] = array(
      '#type' => 'submit',
      '#value' => t('Remove Result'),
      '#limit_validation_errors' => array (),
      '#submit' => array('ajax_example_add_answer_more_remove_one'),
      '#ajax' => array(
        'callback' => 'ajax_example_add_answer_more_callback',
        'wrapper' => 'answer-fieldset-wrapper',
      ),
    );
  }

  $num_question = 0;
  $data_pregunta = NULL;
  if($id_quiz != 0 && isset($data_quiz))
  {
    $data_pregunta = _weddings_quiz_get_preguntas_by_quiz($id_quiz, $num_question);

    if (empty($form_state['num_question']))
    {
      $form_state['num_question'] = $num_question;
    }
    else
    {
      $num_question = $form_state['num_question'];
    }

  }
  else
  {
    if (empty($form_state['num_question']))
    {
      $num_question = $form_state['num_question'] = 2;
    }
    else
    {
      $num_question = $form_state['num_question'];
    }
  }


  $form['question_fieldset'] = array(
    '#type' => 'fieldset',
    '#title' => t('Questions'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#prefix' => '<div id="question-fieldset-wrapper">',
    '#suffix' => '</div>',
  );

  $form['number_question'] = array(
    '#type' => 'hidden',
    '#value' => $num_question,
  );

  $numQ = 0;
  for ($i = 1; $i <= $form_state['num_question']; $i++)
  {
    $form['question_fieldset'][$i] = array(
      '#type' => 'fieldset',
      '#title' => t('Question ').$i,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );
    if($id_quiz != 0)
    {
      $form['question_fieldset'][$i]['id_question'.$i] = array(
        '#type' => 'hidden',
        '#value' => isset($data_pregunta[$numQ]['id_pregunta']) ? $data_pregunta[$numQ]['id_pregunta'] : '',
      );
    }

    $form['question_fieldset'][$i]['name_question'.$i] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t('Title').$i,
      '#default_value' => isset($data_pregunta[$numQ]['pregunta']) ? $data_pregunta[$numQ]['pregunta'] : '',
    );

    for ($j = 1; $j <= $num_opciones; $j++)
    {
      if($id_quiz != 0)
      {
        $form['question_fieldset'][$i][$j]['id_option'.$i.$j]  = array(
          '#type' => 'hidden',
          '#value' => isset($data_pregunta[$numQ]['opt'][$j-1]) ? $data_pregunta[$numQ]['opt'][$j-1]['id_opcion'] : '',
        );
      }
      $form['question_fieldset'][$i][$j]['name_option'.$i.$j] = array(
        '#type' => 'textfield',
        '#required' => TRUE,
        '#title' => t('Option ').$j,
        '#maxlength' => 41,
        '#default_value' => isset($data_pregunta[$numQ]['opt'][$j-1]['titulo']) ? $data_pregunta[$numQ]['opt'][$j-1]['titulo']:'',
      );
      $form['question_fieldset'][$i][$j]['img_option'.$i.$j] = array(
        '#type' => 'managed_file',
        '#title' => t('Image of the option').$j,
        '#description' => t('Upload an image, with extensions: jpg, jpeg, png, gif').'<br/>'.t('Recommended dimension 317 x 216 pixel'),
        '#required' => TRUE,
        '#upload_location' => 'public://quiz/opcion/',
        '#default_value' => isset($data_pregunta[$numQ]['opt'][$j-1]['id_img_opcion']) ? $data_pregunta[$numQ]['opt'][$j-1]['id_img_opcion'] : '',
        '#theme' => 'weddings_quiz_image_upd',
        '#upload_validators' => array(
          'file_validate_extensions' => array('gif png jpg jpeg'),
        )
      );
    }
    $numQ++;
  }

  if ($form_state['num_question'] < 10) {
    $form['question_fieldset']['add_question'] = array(
      '#type' => 'submit',
      '#value' => t('Add one more'),
      '#limit_validation_errors' => array (),
      '#submit' => array('ajax_example_add_question_more_add_one'),
      '#ajax' => array(
        'callback' => 'ajax_example_add_question_more_callback',
        'wrapper' => 'question-fieldset-wrapper',
      ),
    );
  }
  if ($form_state['num_question'] > 2) {
    $form['question_fieldset']['remove_question'] = array(
      '#type' => 'submit',
      '#value' => t('Remove one'),
      '#limit_validation_errors' => array (),
      '#submit' => array('ajax_example_add_question_more_remove_one'),
      '#ajax' => array(
        'callback' => 'ajax_example_add_question_more_callback',
        'wrapper' => 'question-fieldset-wrapper',
      ),
    );
  }

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
    '#submit' => array('weddings_quiz_form_submit'),
  );

  return $form;
}


/**
 * Submit handler for the "add-one-more" button.
 *
 * Increments the max counter and causes a rebuild.
 */
function ajax_example_add_answer_more_add_one($form, &$form_state)
{
  $form_state['num_answer']++;
  $form_state['rebuild'] = TRUE;
}

/**
 * Submit handler for the "remove one" button.
 *
 * Decrements the max counter and causes a form rebuild.
 */
function ajax_example_add_answer_more_remove_one($form, &$form_state)
{
  if ($form_state['num_answer'] > 1)
  {
    $form_state['num_answer']--;
  }
  $form_state['rebuild'] = TRUE;
}

/**
 * Submit handler for the "add-one-more" button.
 *
 * Increments the max counter and causes a rebuild.
 */
function ajax_example_add_answer_more_callback($form, $form_state)
{
  return $form['answer_fieldset'];
}

/**
 * Submit handler for the "add-one-more" button.
 *
 * Increments the max counter and causes a rebuild.
 */
function ajax_example_add_question_more_add_one($form, &$form_state)
{
  $form_state['num_question']++;
  $form_state['rebuild'] = TRUE;
}

/**
 * Submit handler for the "remove one" button.
 *
 * Decrements the max counter and causes a form rebuild.
 */
function ajax_example_add_question_more_remove_one($form, &$form_state)
{
  if ($form_state['num_question'] > 1)
  {
    $form_state['num_question']--;
  }
  $form_state['rebuild'] = TRUE;
}

/**
 * Submit handler for the "add-one-more" button.
 *
 * Increments the max counter and causes a rebuild.
 */
function ajax_example_add_question_more_callback($form, $form_state)
{
  return $form['question_fieldset'];
}

/**
 * Funcion que procesa el fomulario de registro de quiz
 *
 * @param $form
 * @param $form_state
 */
function weddings_quiz_form_submit($form, &$form_state)
{
  if($form_state['values']['id_quiz'] == 0)
  {
    drupal_set_message(t('Registro Exitoso.', array(
        '@language' => $form_state['values']['language'],
        '@nombre_quiz' => $form_state['values']['name'],
        '@descripcion' => check_markup($form_state['values']['descripcion']['value'], $form_state['values']['descripcion']['format']),
        '@id_img_quiz' => $form_state['values']['img_home'],
        '@id_img_banner_preg' => $form_state['values']['img_detalle'],
        '@id_img_banner_mobile_preg' => $form_state['values']['img_detalle_mobile'],
      )
    ));

    $id_quiz = _weddings_quiz_guardar_quiz($form_state);

    if ($id_quiz !== FALSE)
    {
      _weddings_quiz_almacenar_imagenes($form_state['values']['img_home'], $id_quiz, 'quiz');
      _weddings_quiz_almacenar_imagenes($form_state['values']['img_detalle'], $id_quiz, 'quiz');
      _weddings_quiz_almacenar_imagenes($form_state['values']['img_detalle_mobile'], $id_quiz, 'quiz');

      /*Insert Respuestas*/
      for ($i = 1; $i <= $form_state['values']['number_answer']; $i++)
      {
        ${"id_respuesta" . $i} = _weddings_quiz_guardar_respuestas($form_state, $id_quiz, $i);

        if (${"id_respuesta" . $i} !== FALSE)
        {
          _weddings_quiz_almacenar_imagenes($form_state['values']['img_title_answer' . $i], $id_quiz, 'quiz_respuesta');
          _weddings_quiz_almacenar_imagenes($form_state['values']['img_title_answer_mobile' . $i], $id_quiz, 'quiz_respuesta');
          _weddings_quiz_almacenar_imagenes($form_state['values']['img_answer' . $i], $id_quiz, 'quiz_respuesta');
          _weddings_quiz_almacenar_imagenes($form_state['values']['img_galeria1' . $i], $id_quiz, 'quiz_respuesta');
          _weddings_quiz_almacenar_imagenes($form_state['values']['img_galeria2' . $i], $id_quiz, 'quiz_respuesta');
          _weddings_quiz_almacenar_imagenes($form_state['values']['img_galeria3' . $i], $id_quiz, 'quiz_respuesta');
        }
      }

      /*Insert preguntas y opciones*/
      for ($i = 1; $i <= $form_state['values']['number_question']; $i++)
      {
        $id_pregunta = _weddings_quiz_guardar_pregunta($form_state, $id_quiz, $i);
        if ($id_pregunta !== FALSE)
        {
          for ($j = 1; $j <= $form_state['values']['number_answer']; $j++)
          {
            if (${"id_respuesta" . $j} !== FALSE)
            {
              $id_op = _weddings_quiz_guardar_opciones($form_state, $id_pregunta, ${'id_respuesta'.$j}, $i, $j);
              if ($id_op !== FALSE)
              {
                _weddings_quiz_almacenar_imagenes($form_state['values']['img_option' . $i . $j], $id_quiz, 'quiz_opcion');
              }
            }
          }
        }
      }
    }
  }
  else
  {
    /* Actualizacion Quiz */
    $res_quiz = _weddings_quiz_get_quiz_id($form_state['values']['id_quiz']);

    $update = _weddings_quiz_actualizar_quiz($form_state);

    if ($update !== FALSE)
    {
      if($res_quiz[0]['id_img_quiz'] != $form_state['values']['img_home'])
      {
        _weddings_quiz_remover_imagenes($res_quiz[0]['id_img_quiz'], $form_state['values']['id_quiz'],'quiz');
        _weddings_quiz_almacenar_imagenes($form_state['values']['img_home'], $form_state['values']['id_quiz'],'quiz');
      }

      if($res_quiz[0]['id_img_banner_preg'] != $form_state['values']['img_detalle'])
      {
        _weddings_quiz_remover_imagenes($res_quiz[0]['id_img_banner_preg'], $form_state['values']['id_quiz'], 'quiz');
        _weddings_quiz_almacenar_imagenes($form_state['values']['img_detalle'], $form_state['values']['id_quiz'],'quiz');
      }

      if($res_quiz[0]['id_img_banner_mobile_preg'] != $form_state['values']['img_detalle_mobile'])
      {
        _weddings_quiz_remover_imagenes($res_quiz[0]['id_img_banner_mobile_preg'], $form_state['values']['id_quiz'], 'quiz');
        _weddings_quiz_almacenar_imagenes($form_state['values']['img_detalle_mobile'], $form_state['values']['id_quiz'],'quiz');
      }
    }
    /* Fin Actualizacion Quiz */

    /* Actualizacion Respuestas */
    $numrespuesta = 0;
    $res_respuesta = _weddings_quiz_get_respuestas_by_quiz($form_state['values']['id_quiz'], $numrespuesta);

    /*Valida si el numero de respuestas enviado es menor al existente en la base de datos
      Si el numero de repuestas es menor, elimina las respuestas que no hayan sido enviadas */
    if ($numrespuesta > $form_state['values']['number_answer'])
    {
      for ($i = $form_state['values']['number_answer']; $i < $numrespuesta; $i++)
      {
        $num_deleted = _weddings_quiz_eliminar_respuestas($res_respuesta[$i]['id_respuesta']);

        if ($num_deleted !== FALSE)
        {
          if ($res_respuesta[$i]['id_img_banner_respuesta'] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i]['id_img_banner_respuesta'], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i]['id_img_banner_mobile_respuesta'] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i]['id_img_banner_mobile_respuesta'], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i]['id_img_pregunta'] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i]['id_img_pregunta'], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i]['id_img_galeria_1'] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i]['id_img_galeria_1'], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i]['id_img_galeria_2'] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i]['id_img_galeria_2'], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i]['id_img_galeria_3'] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i]['id_img_galeria_3'], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          $delopciones = 0;
          $del_opciones = _weddings_quiz_get_opciones_by_respuesta($res_respuesta[$i]['id_respuesta'], $delopciones);

          if ($delopciones > 0)
          {
            for ($j = 1; $j <= $delopciones; $j++)
            {
              $num_deleted = _weddings_quiz_eliminar_opcion($del_opciones[$j - 1]['id_opcion']);

              if ($num_deleted !== FALSE)
              {
                if ($del_opciones[$j - 1]['id_img_opcion'] != 0)
                {
                  _weddings_quiz_remover_imagenes($del_opciones[$j - 1]['id_img_opcion'], $form_state['values']['id_quiz'], 'quiz_opcion');
                }
              }
            }
          }
        }
      }
    }

    for ($i = 1; $i <= $form_state['values']['number_answer']; $i++)
    {
      if(isset($form_state['values']['id_answer'.$i]) && $form_state['values']['id_answer'.$i] != '' )
      {
        $update = _weddings_quiz_actualizar_respuestas($form_state, $i);

        if ($update !== FALSE)
        {
          ${"id_respuesta" . $i} = $form_state['values']['id_answer' . $i];

          if ($res_respuesta[$i - 1]['id_img_banner_respuesta'] != $form_state['values']['img_title_answer' . $i] && $form_state['values']['img_title_answer' . $i] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i - 1]['id_img_banner_respuesta'], $form_state['values']['id_quiz'], 'quiz_respuesta');
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_title_answer' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i - 1]['id_img_banner_mobile_respuesta'] != $form_state['values']['img_title_answer_mobile' . $i] && $form_state['values']['img_title_answer_mobile' . $i] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i - 1]['id_img_banner_mobile_respuesta'], $form_state['values']['id_quiz'], 'quiz_respuesta');
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_title_answer_mobile' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i - 1]['id_img_pregunta'] != $form_state['values']['img_answer' . $i] && $form_state['values']['img_answer' . $i] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i - 1]['id_img_pregunta'], $form_state['values']['id_quiz'], 'quiz_respuesta');
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_answer' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i - 1]['id_img_galeria_1'] != $form_state['values']['img_galeria1' . $i] && $form_state['values']['img_galeria1' . $i] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i - 1]['id_img_galeria_1'], $form_state['values']['id_quiz'], 'quiz_respuesta');
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_galeria1' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i - 1]['id_img_galeria_2'] != $form_state['values']['img_galeria2' . $i] && $form_state['values']['img_galeria2' . $i] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i - 1]['id_img_galeria_2'], $form_state['values']['id_quiz'], 'quiz_respuesta');
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_galeria2' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($res_respuesta[$i - 1]['id_img_galeria_3'] != $form_state['values']['img_galeria3' . $i] && $form_state['values']['img_galeria3' . $i] != 0)
          {
            _weddings_quiz_remover_imagenes($res_respuesta[$i - 1]['id_img_galeria_3'], $form_state['values']['id_quiz'], 'quiz_respuesta');
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_galeria3' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }
        }
      }
      else
      {
        ${"id_respuesta" . $i} = _weddings_quiz_guardar_respuestas($form_state, $form_state['values']['id_quiz'], $i);
        if (${"id_respuesta" . $i} !== FALSE)
        {

          if ($form_state['values']['img_title_answer' . $i] != 0) {
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_title_answer' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($form_state['values']['img_title_answer_mobile' . $i] != 0) {
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_title_answer_mobile' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($form_state['values']['img_answer' . $i] != 0) {
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_answer' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($form_state['values']['img_galeria1' . $i] != 0) {
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_galeria1' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($form_state['values']['img_galeria2' . $i] != 0) {
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_galeria2' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }

          if ($form_state['values']['img_galeria3' . $i] != 0) {
            _weddings_quiz_almacenar_imagenes($form_state['values']['img_galeria3' . $i], $form_state['values']['id_quiz'], 'quiz_respuesta');
          }
        }
      }
    }
    /* FIN Actualizacion Respuestas */

    /* Actualizacion Preguntas */
    $numpregunta = 0;
    $res_pregunta = _weddings_quiz_get_preguntas_by_quiz($form_state['values']['id_quiz'], $numpregunta);

    /*Valida si el numero de preguntas enviado es menor al existente en la base de datos
          Si el numero de preguntas es menor, elimina las preguntas que no hayan sido enviadas */
    if ($numpregunta > $form_state['values']['number_question'])
    {
      for ($i = $form_state['values']['number_question']; $i < $numpregunta; $i++)
      {
        $num_deleted = _weddings_quiz_eliminar_pregunta($res_pregunta[$i]['id_pregunta']);

        if ($num_deleted !== FALSE)
        {
          $numopciones = 0;
          $del_opciones = _weddings_quiz_get_opciones_by_pregunta($res_pregunta[$i]['id_pregunta'], $numopciones);

          if ($numopciones > 0)
          {
            for ($j = 1; $j <= $numopciones; $j++)
            {
              $num_deleted = _weddings_quiz_eliminar_opcion($del_opciones[$j-1]['id_opcion']);

              if($del_opciones[$j-1]['id_img_opcion'] != 0 && $num_deleted !== FALSE)
              {
                _weddings_quiz_remover_imagenes($del_opciones[$j-1]['id_img_opcion'], $form_state['values']['id_quiz'], 'quiz_opcion');
              }
            }
          }
        }
      }
    }

    for ($i = 1; $i <= $form_state['values']['number_question']; $i++)
    {
      if(isset($form_state['values']['id_question'.$i]) && $form_state['values']['id_question'.$i] != '')
      {
        $update = _weddings_quiz_actualizar_preguntas($form_state, $i);

        if ($update !== FALSE)
        {
          /* Actualizacion Opciones */
          $numopcion = 0;
          $res_opcion = _weddings_quiz_get_opciones_by_pregunta($form_state['values']['id_question'.$i], $numopcion);

          for ($j = 1; $j <= $form_state['values']['number_answer']; $j++)
          {
            if (isset($form_state['values']['id_option'.$i.$j]) && $form_state['values']['id_option'.$i.$j] != '')
            {
              $update = _weddings_quiz_actualizar_opcion($form_state, $i, $j);
              if($update !== FALSE && $res_opcion[$j-1]['id_img_opcion'] != $form_state['values']['img_option'.$i.$j] && $form_state['values']['img_option'.$i.$j] != 0)
              {
                _weddings_quiz_remover_imagenes($res_opcion[$j-1]['id_img_opcion'], $form_state['values']['id_quiz'], 'quiz_opcion');
                _weddings_quiz_almacenar_imagenes($form_state['values']['img_option'.$i.$j], $form_state['values']['id_quiz'], 'quiz_opcion');
              }
            }
            else
            {
              $id_op = _weddings_quiz_guardar_opciones($form_state, $form_state['values']['id_question'.$i], ${"id_respuesta" . $j}, $i, $j);
              if ($id_op !== FALSE)
              {
                _weddings_quiz_almacenar_imagenes($form_state['values']['img_option'.$i.$j], $form_state['values']['id_quiz'], 'quiz_opcion');
              }
            }
          }
          /* FIN Actualizacion Opciones */
        }
      }
      else
      {
        $id_pregunta = _weddings_quiz_guardar_pregunta($form_state, $form_state['values']['id_quiz'], $i);
        if ($id_pregunta !== FALSE)
        {
          for ($j = 1; $j <= $form_state['values']['number_answer']; $j++)
          {
            $id_op = _weddings_quiz_guardar_opciones($form_state, $id_pregunta, ${"id_respuesta" . $j}, $i, $j);
            if ($id_op !== FALSE)
            {
              _weddings_quiz_almacenar_imagenes($form_state['values']['img_option'.$i.$j], $form_state['values']['id_quiz'], 'quiz_opcion');
            }
          }
        }
      }
    }
    /* FIN Actualizacion Preguntas */
  }
  $form_state['redirect'] = 'admin/structure/weddings_quiz/list';
}

/**
 * Procesa la accion de inactivar un quiz
 * @param $id_quiz
 */
function weddings_quiz_inactive($id_quiz) {
  //debug($id_quiz);
  $update = db_update('quiz')
    ->fields(array(
      'estado' => 2,
    ))
    ->condition('id_quiz', $id_quiz, '=')
    ->execute();

  drupal_goto(url('admin/structure/weddings_quiz/list', array('absolute' => TRUE)));

  //$form_state['redirect'] = 'admin/structure/weddings_quiz';
}

/**
 * Procesa la accion de activar un quiz
 * @param $id_quiz
 */
function weddings_quiz_active($id_quiz) {
  //debug($id_quiz);
  $update = db_update('quiz')
    ->fields(array(
      'estado' => 1,
    ))
    ->condition('id_quiz', $id_quiz, '=')
    ->execute();

  drupal_goto(url('admin/structure/weddings_quiz/list', array('absolute' => TRUE)));

  //$form_state['redirect'] = 'admin/structure/weddings_quiz';
}

/*
 * Funcion weddings_quiz_lead_form con hook _form
 * Formulario de captura de lead, se debe llenar la información antes de presentar
 * el resultado, es donde se procesan las opciones seleccionadas y se determina el
 * resultado
 * @param $form, &$form_state propicos del hook _form
 * @param interger $ultimo es la ultima opcion seleccionada en la ultima pregunta
 * @return $fomr propio del hook
 */
function weddings_quiz_lead_form($form, &$form_state, $id_quiz, $ultimo) {

  if(isset($_SESSION['quiz']))
  {
    foreach ($_SESSION['quiz'] as $k => $val)
    {
      if($k == 'result'.$ultimo)
      {
        $_SESSION['quiz'][$k] = $_SESSION['quiz'][$k] + 1;
      }
    }

    $mayor = max($_SESSION['quiz']);
    $conMayor = 0;
    $posFinal = 100;
    foreach ($_SESSION['quiz'] as $k => $val)
    {
      if($_SESSION['quiz'][$k] == $mayor)
      {
        $conMayor++;
        if($conMayor > 1)
        {
          $resMayor = explode('result', $k);
          $posInicial = $resMayor[1];
          if($posFinal > $posInicial)
          {
            $posFinal = $posInicial;
            $valorResultado = $posFinal;
          }
        }
        else
        {
          $resMayor = explode('result', $k);
          $valorResultado = $resMayor[1];
        }
      }
    }
  }
  else
  {
    $valorResultado = 1;
  }

  $data_quiz = _weddings_quiz_get_quiz_id($id_quiz);

  if (isset($data_quiz))
  {
    $image_fondopreg_quiz = file_load($data_quiz[0]['id_img_banner_preg']);
    $img_fondopreg_quiz_url = $image_fondopreg_quiz->uri;

    $image_fondopreg_mobile_quiz = file_load($data_quiz[0]['id_img_banner_mobile_preg']);
    $img_fondopreg__mobile_quiz_url = $image_fondopreg_mobile_quiz->uri;

    $form['descrip_ini'] = array(
      '#markup' => '<section class="bloque-banner container-fluid">
                    <a href=""><img src="'.base_path().drupal_get_path('theme', 'weddings') .'/img/logoBrand.png" alt="" class="logo-mobile"></a>
                    <picture>
                        <source srcset="'. file_create_url($img_fondopreg__mobile_quiz_url) .'" media="(max-width: 767px)">
                        <source srcset="'. file_create_url($img_fondopreg_quiz_url).'">
                        <img srcset="'. file_create_url($img_fondopreg_quiz_url).'">
                    </picture>
                  </section>
                  
                  <section class="container-fluid bloque-breadcrumb">
                    <div class="container">
                        <ul>
                            <li>'. l(t('Home'), '<front>') .'</li>
                            <li>'. l(t('Quiz'), 'quiz') .'</li>
                            <li>'. l(strip_tags($data_quiz[0]['nombre_quiz']), 'quiz/ini/'.$data_quiz[0]['id_quiz']) .'</li>
                        </ul>
                    </div>
                  </section>
                  
                  <section class="container-fluid bloque-intro">
                    <div class="container">
                        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                            <div class="separador"></div>
                            '. $data_quiz[0]['descripcion'] .'
                        </div>
                    </div>
                  </section>
                  
                  <section class="container-fluid bloque-quiz-preguntas">
                    <section class="container-fluid bloque-form bloque-quiz-form visible">
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-12 content-form">
                            <h2 class="titulo_bloque">'. t('Well, that was fun!') .'</h2>',
    );

    $form['name'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#size' => 20,
      '#maxlength' => 100,
      //'#title' => t('Enter Your Name'),
      '#placeholder' => t('First Name'),
      '#attributes' => array('class' => array('text')),
      '#theme_wrappers' => array(),
      '#prefix' => '<div class="row"><div class="col-md-6 col-sm-6 col-xs-12">'
    );

    $form['lastname'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#size' => 20,
      '#maxlength' => 100,
      //'#title' => t('Enter Your Last Name'),
      '#placeholder' => t('Last Name'),
      '#attributes' => array('class' => array('text')),
      '#theme_wrappers' => array(),
      '#prefix' => '</div><div class="col-md-6 col-sm-6 col-xs-12">',
      '#suffix' => '</div></div>'
    );

    $form['resultado'] = array(
      '#type' => 'hidden',
      '#value' => $valorResultado,
    );

    $form['descrip_med'] = array(
      '#markup' => "<p class='vino_tinto'>".t("We'll send you more fun quizzes and info at.")."</p>",
    );

    $form['email'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#size' => 20,
      '#maxlength' => 120,
      '#placeholder' => t('email'),
      '#attributes' => array('class' => array('text')),
      '#theme_wrappers' => array(),
      '#prefix' => '<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">',
      '#suffix' => '</div></div>'
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('see your results'),
      '#prefix' => '<div class="row"><div class="col-md-6 col-sm-6 col-xs-12">',
      '#suffix' => '</div></div>'
      //'#submit' => 'weddings_quiz_lead_form_submit',
    );

    $form['descrip_fin'] = array(
      '#markup' => '</div>
                    <div class="col-md-6 col-sm-6 col-xs-12 container-img">
                        <img src="'.base_path().drupal_get_path('module', 'weddings_quiz') .'/img/img-quiz-form.jpg" class="img-responsive">
                    </div>
                  </section>',
    );
  }
  return $form;
}

/**
 * Funcion encargada de llevar a cabo el guardado de los datos de formulario
 * @author Sebastian Aristizabal - Ariadana CDI Manizales
 *
 * @param $form_state
 *
 * @return bool|\DatabaseStatementInterface|int
 */
function _weddings_quiz_guardar_lead_form($form_state){
  try
  {
    $fields = array(
      'nombre' => $form_state['values']['name'],
      'apellido' => $form_state['values']['lastname'],
      'mail' => $form_state['values']['email'],
      'id_respuesta' => $form_state['values']['resultado'],
    );
    $id_quiz = db_insert('quiz_lead')
      ->fields($fields)
      ->execute();

    return $id_quiz;
  }
  catch (Exception $e)
  {
    watchdog('weddings_quiz', 'Error almacenando el formulario. Error: '.$e->getMessage(), WATCHDOG_ERROR);
    return FALSE;
  }
}

/**
 * Funcion encargada de procesar la informacion del formulario para quiz
 * @param $form
 * @param $form_state
 */
function weddings_quiz_lead_form_submit($form, &$form_state)
{
  $id_quiz = _weddings_quiz_guardar_lead_form($form_state);

  if ($id_quiz !== FALSE)
  {
    $sub_fields = array(
      'First__Name' => $form_state['values']['name'],
      'Last__Name' => $form_state['values']['lastname'],
      'Email__Address' => $form_state['values']['email'],
      'Description' => 'QUIZ Resultado'.$form_state['values']['resultado'],
    );

    /* 20150408 CHG acruz Se valida si la utm fue creada como variable de Session y se agrega
     * en el array $sub_fields para enviar a exacctarget
     */
    $hoy = date('m/d/Y');
    $sub_fields['List__added__date'] = $hoy;
    if(isset($_SESSION['utm_source_palace']))
      $sub_fields['utm_source'] = $_SESSION['utm_source_palace'];
    if(isset($_SESSION['utm_medium_palace']))
      $sub_fields['utm_medium'] = $_SESSION['utm_medium_palace'];
    if(isset($_SESSION['utm_campaign_palace']))
      $sub_fields['utm_campaign'] = $_SESSION['utm_campaign_palace'];
    if(isset($_SESSION['utm_content_palace']))
      $sub_fields['utm_content'] = $_SESSION['utm_content_palace'];
    if(isset($_SESSION['utm_term_palace']))
      $sub_fields['utm_term'] = $_SESSION['utm_term_palace'];
    if(isset($_SESSION['phonalytics_palace']))
      $sub_fields['phonalytics'] = $_SESSION['phonalytics_palace'];

    //@macccevedor 08/02/2017 se configura el envio a hubspot
    $hubspot_source = isset($_SESSION['utm_source_palace']) ? $_SESSION['utm_source_palace'] : '';
    $hubspot_medium = isset($_SESSION['utm_medium_palace']) ? $_SESSION['utm_medium_palace'] : '';
    $hubspot_campaign = isset($_SESSION['utm_campaign_palace']) ? $_SESSION['utm_campaign_palace'] : '';
    $hubspot_content = isset($_SESSION['utm_content_palace']) ? $_SESSION['utm_content_palace'] : '';
    $hubspot_term = isset($_SESSION['utm_term_palace']) ? $_SESSION['utm_term_palace'] : '';

    $url = 'https://forms.hubspot.com/uploads/form/v2/2284186/1ef310f0-a504-475c-9569-b7ce3023ad26';
    //Activar esta linea y borrar la siguiente para incluir nuevas UTM
    //$myvars = 'Email=' . $form_state['values']['email'] . '&First Name=' . $form_state['values']['name'].'&Last Name'.$form_state['values']['lastname'].'&utm_campaign='.$hubspot_campaign.'&source='. $hubspot_source.'&utm_medium='.$hubspot_medium.'&utm_content='.$hubspot_content.'&utm_term='.$hubspot_term;
    $myvars = 'Email=' . $form_state['values']['email'] . '&First Name=' . $form_state['values']['name'].'&Last Name'.$form_state['values']['lastname'].'&utm_campaign='.$hubspot_campaign.'&source='. $hubspot_source.'&utm_medium='.$hubspot_medium;

    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec( $ch );

    $nameQuiz = '';
    if ($response !== FALSE)
    {
      $nameQuiz = urlencode(str_replace(' ', '', strtolower(get_name_quiz_result ($form_state['values']['resultado']))));
    }
    else
    {
      watchdog('weddings_quiz', 'Error enviando los datos a hubspot. Error: '.curl_error($ch), WATCHDOG_ERROR);
      drupal_set_message(t('Error sending data to hubspot'));
    }
    $form_state['redirect'] = 'quiz/result/'.$form_state['values']['resultado'].'/'.$nameQuiz;
  }
  else
  {
    drupal_set_message(t('Error saving form data'), 'error');
  }
}

/**
 * Funcion que valida la informacion del formulario de quiz
 * @param $form
 * @param $form_state
 */
function weddings_quiz_lead_form_validate($form, &$form_state)
{
  $mail = $form_state['values']['email'];
  if (!valid_email_address($mail)) {
    form_set_error('email', t('The email address appears to be invalid.'));
  }

  if (preg_match('/^.*(?=.*[@#$%^&+=0-9]).*$/', $form_state['values']['name'])) {
    form_set_error('name', t('The name appears to be invalid.'));
  }

  if (preg_match('/^.*(?=.*[@#$%^&+=0-9]).*$/', $form_state['values']['lastname'])) {
    form_set_error('lastname', t('The lastname appears to be invalid.'));
  }
}

/**
 * Simple wrapper function for drupal_mail() to avoid extraneous code.
 */
function weddings_quiz_mail($from = 'default_from', $to, $subject, $message) {
  $my_module = 'custom';
  $my_mail_token = microtime();
  if ($from == 'default_from') {
    // Change this to your own default 'from' email address.
    $from = variable_get('system_mail', 'My Email Address <example@example.com>');
  }
  $message = array(
    'id' => $my_module . '_' . $my_mail_token,
    'to' => $to,
    'subject' => $subject,
    'body' => array($message),
    'from' => $from,
    'headers' => array(
      'Sender' => $from,
      'Content-Type' => 'text/html; charset=UTF-8; format=flowed; delsp=yes',
      'Return-Path' => $from,
    ),
  );
  $system = drupal_mail_system($my_module, $my_mail_token);
  $message = $system->format($message);
  if ($system->mail($message)) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}