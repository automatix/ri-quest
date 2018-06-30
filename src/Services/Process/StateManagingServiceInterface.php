<?php
namespace App\Services\Process;

use App\Base\Enums\ProcessName;

/**
 * Interface StateDetectingServiceInterface.
 * Provides functionality to detect,
 * at which point (the state of the Scenario, POI, and Step) of the process
 * the user is currently staying.
 *
 * @package App\Services\Process
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface StateManagingServiceInterface
{

    /**
     * Detects the current ScenarioState, PoiState, and StepState and
     * provides them as a concatenated string following this notation:
     * Scenario[SCENARIO_STATE]Poi[POI_STATE]Step[STEP_STATE].
     *
     * @return string
     */
    function detectFullState();

    function detectProcessState(ProcessName $processName);

}
