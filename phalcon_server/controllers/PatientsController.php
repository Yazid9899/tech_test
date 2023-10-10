<?php


namespace MyApp\Controllers;

use MyApp\Models\Patient;
use Phalcon\Mvc\Controller;

class PatientsController extends Controller
{
  private function createJsonResponse($data, $statusCode = 200, $message = 'success')
  {
    $statusText = '';
    switch ($statusCode) {
      case 200:
        $statusText = 'success';
        break;
      case 201:
        $statusText = 'created';
        break;
      case 400:
        $statusText = 'bad request';
        break;
      case 404:
        $statusText = 'not found';
        break;
      case 500:
        $statusText = 'internal server error';
        break;
      default:
        $statusText = 'unknown';
    }

    $response = [
      'status' => [
        'code' => $statusCode,
        'response' => $statusText,
        'message' => $message,
      ],
      'result' => $data ?: null,
    ];

    $this->response->setJsonContent($response);
    $this->response->setStatusCode($statusCode);

    return $this->response;
  }

  public function index()
  {
    $patients = Patient::find();

    return $this->createJsonResponse($patients);
  }

  public function get($id)
  {
    $patient = Patient::findFirstById($id);

    if (!$patient) {
      return $this->createJsonResponse(null, 404, 'Patient not found');
    }

    return $this->createJsonResponse($patient);
  }

  public function create()
  {
    $data = $this->request->getJsonRawBody();
    $patient = new Patient();

    $patient->name = $data->name;
    $patient->sex = $data->sex;
    $patient->religion = $data->religion;
    $patient->phone = $data->phone;
    $patient->address = $data->address;
    $patient->nik = $data->nik;

    if ($patient->save() === false) {
      $messages = $patient->getMessages();
      $errors = [];

      foreach ($messages as $message) {
        $errors[] = [
          'field' => $message->getField(),
          'message' => $message->getMessage(),
        ];
      }

      return $this->createJsonResponse(['errors' => $errors], 400, 'Failed to create patient');
    }

    return $this->createJsonResponse($patient, 201, 'Patient created successfully');
  }

  public function update($id)
  {
    $patient = Patient::findFirstById($id);

    if (!$patient) {
      return $this->createJsonResponse(null, 404, 'Patient not found');
    }

    $data = $this->request->getJsonRawBody();

    $patient->name = $data->name;
    $patient->sex = $data->sex;
    $patient->religion = $data->religion;
    $patient->phone = $data->phone;
    $patient->address = $data->address;
    $patient->nik = $data->nik;

    if ($patient->save()) {
      return $this->createJsonResponse(null, 200, 'Patient updated successfully');
    } else {
      return $this->createJsonResponse(null, 500, 'Failed to update patient');
    }
  }

  public function delete($id)
  {
    $patient = Patient::findFirstById($id);

    if (!$patient) {
      return $this->createJsonResponse(null, 404, 'Patient not found');
    }

    if ($patient->delete()) {
      return $this->createJsonResponse($patient, 200, 'Patient deleted successfully');
    } else {
      return $this->createJsonResponse($patient, 500, 'Failed to delete patient');
    }
  }

}