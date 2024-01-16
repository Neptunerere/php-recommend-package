<?php

declare(strict_types=1);

namespace Neptunerere\PhpNexonOpenApi\Command\MapleStory\Ranking;

use Neptunerere\PhpNexonOpenApi\Command\CommandInterface;
use Neptunerere\PhpNexonOpenApi\Enums\{
    MapleStoryCode,
    ApiVersion,
    HttpMethod,
};

class Union implements CommandInterface
{
    /**
     * @var string
     */
    protected string $date;

    /**
     * @var string
     */
    protected string $worldName;

    /**
     * @var string
     */
    protected string $ocid;

    /**
     * @var string
     */
    protected string $page;

    /**
     * @param string $date
     * @param string $worldName
     * @param string $ocid
     * @param string $page
     */
    public function __construct
    (
        string $date, string $worldName,
        string $ocid, string $page
    )
    {
        $this->date = $date;
        $this->worldName = $worldName;
        $this->ocid = $ocid;
        $this->page = $page;
    }

    /**
     * {@inheritDoc}
     */
    public function getGameName()
    {
        return MapleStoryCode::MAPLESTORY;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod()
    {
        return MapleStoryCode::RANKING . '/union';
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion()
    {
        return (string) ApiVersion::VERSION_1;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestMethod()
    {
        return (string) HttpMethod::GET;
    }

    /**
     * {@inheritDoc}
     */
    public function getParams()
    {
        return array(
            'date' => $this->date,
            'world_name' => $this->worldName,
            'ocid' => $this->ocid,
            'page' => $this->page,
        );
    }
}