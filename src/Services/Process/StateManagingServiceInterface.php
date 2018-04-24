<?php
namespace App\Services\Process;

/**
 * Interface StateDetectingServiceInterface.
 * Provides functionality to detect,
 * at which point (the state of the Quest, POI, and Step) of the process
 * the user is currently staying.
 *
 * @package App\Services\Process
 * @author Ilya Khanataev <contact@mevatex.com>
 */
interface StateManagingServiceInterface
{

    /**
     * Detects the current QuestState, PoiState, and StepState and
     * provides them as a concatenated string following this notation:
     * Quest[QUEST_STATE]Poi[POI_STATE]Step[STEP_STATE].
     *
     * @return string
     */
    function detectFullState();

    function detectQuestState();

    function detectPoiState();

    function detectStepState();

}
