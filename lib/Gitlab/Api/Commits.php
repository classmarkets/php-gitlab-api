<?php

namespace Gitlab\Api;

class Commits extends AbstractApi
{
    public function all($project_id = null, $page = 1, $per_page = self::PER_PAGE, array $params = array())
    {
        $path = $this->getPath($project_id);
        $params = array_merge(array(
            'page' => $page,
            'per_page' => $per_page
        ), $params);

        return $this->get($path, $params);
    }

    public function show($project_id, $commitHash)
    {
        $path = $this->getPath($project_id);
        return $this->get("$path/$commitHash");
    }

    private function getPath($project_id)
    {
        return $this->getProjectPath($project_id) . 'repository/commits';
    }
}
