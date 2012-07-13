<?php

$this->titulo = 'Registos';

$this->renderPartial('_emails', array('filtro' => $filtroEmail));

$this->renderPartial('_smss', array('filtro' => $filtroSms));