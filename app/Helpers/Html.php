<?php namespace app\Helpers;

class Html {

    /**
     *  Create bootstrap Modals
     *
     *  You can add $type = users or roles to make list group with links, but there has to be $data as well!
     *
     * @param $id
     * @param $title
     * @param null $body
     * @param $footer
     * @param null $type
     * @param null $data
     * @return string
     */
    public static function modal($id, $title, $body = null, $footer, $type = null, $data = null)
    {

        $response = '
        <!-- Modal ' . $id . ' -->
        <div class="modal fade"
                id="' . $id . '"
             tabindex="-1" role="dialog" aria-labelledby="' . $id . '-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="' . $id . '-label">
                        ' . $title . '
                        </h4>
                    </div>
                    <div class="modal-body">';

        if (isset($type))
        {
            if ($type == 'users')
            {
                $response .= '<ul class="list-group">';
                foreach ($data as $item)
                {
                    $response .= '<a href="' . route("dashboard.users.index") . "/" . $item["id"] . '" class="list-group-item">' . $item['username'] . '</a>';
                }
                $response .= '</ul>';

            } elseif ($type == 'roles')
            {
                $response .= '<ul class="list-group">';
                foreach ($data as $item)
                {
                    $response .= '<a href="' . route("dashboard.users.roles.index") . "/" . $item["id"] . '" class="list-group-item">' . $item['name'] . '</a>';
                }
                $response .= '</ul>';
            }
        }

        $response .= $body;

        $response .= '
                    </div>
                    <div class="modal-footer" style="margin-top: 0;">
                    ' . $footer . '
                    </div>
                </div>
            </div>
        </div>
        ';

        return $response;
    }
}