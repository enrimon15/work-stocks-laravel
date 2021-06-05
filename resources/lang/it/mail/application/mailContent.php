<?php

return [
    'mailSubjectSubscriber' => 'Candidatura registrata correttamente',
    'mailBodySubscriber' => 'Gentile :name :surname,
    abbiamo correttamente registrato la tua candidatura per l\'offerta :jobOfferName pubblicata dall\'azienda :companyName',

    'mailSubjectCompany' => 'Candidatura per un\'offerta pubblicata',
    'mailBodyCompany' => 'Gentile azienda :companyName,
    abbiamo registrato una candidatura da :subscriberName :subscriberSurname per la tua offerta di lavoro dal titolo :jobOfferName',

    'mailSubjectContact' => 'Richiesta di contatto',

    'mailSubjectDeleteApplication' => 'Eliminazione Candidatura',
    'mailBodyDeleteApplication' => 'Gentile azienda :companyName,
    l\'utente :subscriberName :subscriberSurname (:subscriberEmail) ha ritirato la candidatura per la tua offerta di lavoro dal titolo :jobOfferName',
];
