/* ------------------------------------------------------------------------------
@name: LoadImage
@description: LoadImage
--------------------------------------------------------------------------------- */

const LoadImage = (() => {
  // --- handleLoad
  const handleLoad = () => {
    if ($(".card-primary__img__el").length) {
      $(".card-primary__img__el").each((i, el) => {
        $(el).imagesLoaded(() => {
          if (!$(el).parents(".card-primary").hasClass("is-visible")) {
            $(el).parents(".card-primary").addClass("is-visible");
          }
        });
      });
    }
  };

  // --- init
  const init = () => {
    handleLoad();
  };

  return {
    init,
    load: handleLoad,
  };
})();

export default LoadImage;
