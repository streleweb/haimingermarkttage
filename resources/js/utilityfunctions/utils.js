export const sortMostRecentFirst = (programmArr) => {
  const sortedDates = programmArr.sort((a, b) => {
    const dateA = new Date(a.created_at);
    const dateB = new Date(b.created_at);
    return dateB - dateA; // Sort in descending order (most recent first)
  });

  return sortedDates;
}
