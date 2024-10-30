<?php

namespace ContactManagerForPipedrive;

class PipedriveApiCMFP
{
    private $apiKey = "";
    private $client = null;

    public function hasKey()
    {
        return !!$this->apiKey;
    }

    /**
     * @param string $apiKey - if empty gets value from sl-pipedrive-key option
     */
    public function __construct($apiKey = "")
    {
        if ($apiKey) {
            $this->apiKey = $apiKey;
        } else {
            $this->apiKey = get_option("cmfp-pipedrive-key");
        }

        if ($this->apiKey)
            $this->client = new \Pipedrive\Client(null, null, null, $this->apiKey);
    }

    public function getStages() {
        if (!$this->client)
            return [];

        try {
            $response = $this->client->getStages()->getAllStages();
            if ($response && $response->success) {
                $options = [];
                foreach($response->data as $stage) {
                    $options[$stage->id] = $stage->pipelineName . " - " . $stage->name;
                }

                return $options;
            }
        } catch (\Pipedrive\APIException $e) {
            error_log(print_r($e, true));
        }

        return [];
    }

    public function createDeal($stage, $email, $name, $phone, $title = "", $value = 0, $data = []) {
        if (!$this->client)
            return false;

        try {
            if (!$title)
                $title = $name;

            $person = $this->client->getPersons()->addAPerson([
                'email' => [
                    'value' => $email,
                ],
                'phone' => [
                    'value' => $phone,
                ],
                'name' => $name
            ]);
            if ($person && $person->success) {
                $response = $this->client->getDeals()->addADeal([
                    'title' => $title,
                    'stage_id' => $stage,
                    'person_id' => $person->data->id,
                    'value' => $value
                ]);

                if ($data) {
                    $this->client->getNotes()->addANote([
                        'dealId' => $response->data->id,
                        'content' => "<pre>" . print_r($data, true) . "</pre>"
                    ]);
                }
            }
        } catch (\Pipedrive\APIException $e) {
            error_log(print_r($e, true));
            return false;
        }

        return true;
    }
}
