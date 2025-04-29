const melodiApi =
  "https://apis.insee.fr/melodi/data/DS_TOUR_FREQ?totalCount=true&maxResult=100&idTerritoire=true";

async function fetchData() {
  try {
    const response = await fetch(melodiApi);
    if (!response.ok) {
      throw new Error(`HTTP Error: ${response.status}`);
    }
    const data = await response.json();
    const title = data.title.fr;
    const identifier = data.identifier;
    const observations = data.observations;

    if (observations.length === 0) {
      throw new Error("No observations found in the dataset");
    }
    const extractedData = observations.map((obs) => {
      const combinedData = {
        ...obs.dimensions,
        ...obs.attributes,
        OBS_VALUE_NIVEAU: obs.measures.OBS_VALUE_NIVEAU.value,
      };
      return combinedData;
    });
    console.log(`Jeu de données : ${identifier} \nTitre : ${title}`);
    console.table(extractedData);
  } catch (error) {
    console.error("Error fetching data:", error);
  }
}

fetchData();
