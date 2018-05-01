<?php
namespace App\Services\Process;

/**
 * Interface StateDetectingServiceInterface.
 * Provides functionality to detect,
 * at which point (the state of the Route, POI, and Step) of the process
 * the user is currently staying.
 *
 * @package App\Services\Process
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface StateManagingServiceInterface
{

    /**
     * Detects the current RouteState, PoiState, and StepState and
     * provides them as a concatenated string following this notation:
     * Route[ROUTE_STATE]Poi[POI_STATE]Step[STEP_STATE].
     *
     * @return string
     */
    function detectFullState();

    function detectRouteState();

    function detectPoiState();

    function detectStepState();

    function detectAccessState();

    function detectCompletionState();

}
