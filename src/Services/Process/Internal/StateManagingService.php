<?php
namespace App\Services\Process\Internal;

use App\Base\Enums\Processes\States\AccessState;
use App\Base\Enums\Processes\States\CompletionState;
use App\Base\Enums\Processes\States\PoiState;
use App\Base\Enums\Processes\States\QuestState;
use App\Base\Enums\Processes\States\StepState;
use App\Services\Process\StateManagingServiceInterface;

/**
 * @package App\Services\Process\Internal
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class StateManagingService implements StateManagingServiceInterface
{

    public function detectQuestState()
    {
        return QuestState::STARTED();
    }

    public function detectPoiState()
    {
        return PoiState::STARTED();
    }

    public function detectStepState()
    {
        return StepState::STARTED();
    }

    public function detectAccessState()
    {
        return AccessState::STARTED();
    }

    public function detectCompletionState()
    {
        return CompletionState::STARTED();
    }

    /**
     * @inheritdoc
     */
    public function detectFullState()
    {
        return null;
    }

}
