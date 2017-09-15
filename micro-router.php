class MicroCollectionHandler
{
    public $collection,$handlerIndex;

    public function __construct($collection,$handlerIndex)
    {
        $this->collection = $collection;
        $this->handlerIndex = $handlerIndex;
    }
    public function via($methods)
    {
        $this->collection->updateHandlerVia($this->handlerIndex , $methods);
        return $this;
    }
    public function setName($name)
    {
        $this->collection->updateHandlerName($this->handlerIndex , $name);
        return $this;
    }
}

class MicroCollection extends \Phalcon\Mvc\Micro\Collection
{
    public function updateHandlerName($handlerIndex, $name)
    {
        $this->_handlers[$handlerIndex][3] = $name;
    }
    public function updateHandlerVia($handlerIndex, $methods)
    {
        $this->_handlers[$handlerIndex][0] = $methods;
    }
    public function map($routePattern, $handler, $name = NULL)
    {
        parent::map($routePattern, $handler);
        $handlerIndex = count($this->_handlers)-1;
        $handler = $this->_handlers[$handlerIndex];
        return new MicroCollectionHandler($this,$handlerIndex);
    }
    public function get($routePattern, $handler, $name = NULL)
    {
        parent::get($routePattern, $handler);
        $handlerIndex = count($this->_handlers)-1;
        return new MicroCollectionHandler($this,$handlerIndex);
    }
}
