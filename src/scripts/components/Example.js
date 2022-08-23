/* ------------------------------------------------------------------------------
@name: Example
@description: Example
--------------------------------------------------------------------------------- */

const Example = (() => {

  // - handleSayHello
  const handleSayHello = () => {
    console.log('hello example');
  }

  // - init
  const init = () => {
    handleSayHello();
  }

  return {
    init
  }

})();

export default Example
